<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Profile;
use App\Models\Portfolio;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    
    protected $category;

    // 1ページあたりの表示件数
    const NUM_PER_PAGE = 10;

    function __construct(Post $post, Category $category, Profile $profile, Portfolio $portfolio)
    {
        $this->post = $post;
        $this->category = $category;
        $this->profile = $profile;
        $this->portfolio = $portfolio;
    }


    public function index(Request $request, Post $post)
    {

        //新しいものから取得
        $posts = $this->post->latest()->get();

        return view('admin.list', ['posts' => $posts]);
    }

    public function create(Category $category){

        $category = $this->category->getCategoryList();

        return view('admin.create', ['category' => $category]);
    }

    /**
     * 記事の保存
     */
    public function store(PostRequest $request, Post $post){

        $filename = '';
        $image = $request->file('image');
        if( isset($image) === true ){
            // 拡張子を取得
            $ext = $image->guessExtension();
            // アップロードファイル名は[ランダム文字列20文字].[拡張子]
            $filename = sha1(uniqid(rand(), true)) . ".{$ext}";
            // publicディレクトリ(storage/app/public/)のphotosディレクトリに保存
            $path = $image->storeAs('photos', $filename, 'public');
        }

        $this->post->title = $request->title;
        $this->post->content = $request->content;
        $this->post->image = $filename;
        $this->post->category_id = $request->category;
        $this->post->user_id = 1;
        $this->post->save();

        return redirect('/post/list');
    }

    public function edit(Post $post, Category $category){

        $category = $this->category->getCategoryList();

        return view('admin.edit', ['post' => $post, 'category' => $category]);
    }

    public function update(PostRequest $request, Post $post){

        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category;
        $post->user_id = 1;
        $post->save();

        return redirect('/post/list');
    }

    public function destroy(Post $post){
        $post->delete();
        return redirect('/post/list');
    }

    /**
     * カテゴリ一覧画面
     * 
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function category(Category $category)
    {

        $category = $this->category->getCategoryList(self::NUM_PER_PAGE);

        return view('categories.category', ['category' => $category]);
    }

    public function categoryCreate(){
        return view('categories.create');
    }

    /**
     * カテゴリ新規作成API
     */
    public function categoryStore(PostRequest $request, Category $category){

        $this->category->name = $request->name;
        $this->category->display_order = $request->display_order;
        $this->category->save();
        
        return redirect('/post/category');
    }

    public function editCategory(Category $category){
        return view('categories.edit', ['category' => $category]);
    }

    /**
     * カテゴリ編集API
     * 
     * @param PostRequest $request
     * @return 
     */
    public function editUpdate(PostRequest $request, Category $category)
    {

        $category->name = $request->name;
        $category->display_order = $request->display_order;

        $category->save();
        
        return redirect('/post/category');
    }

    /**
     * カテゴリ削除API
     * 
     * @param PostRequest $request
     * @return 
     */    
    public function deleteCategory(Category $category)
    {
        $category->delete();
        return redirect('/post/category');
    }
}
