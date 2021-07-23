<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    
    protected $category;

    // 1ページあたりの表示件数
    const NUM_PER_PAGE = 10;


    public function index(Request $request)
    {
        $post = new Post();

        //新しいものから取得
        $posts = $post->latest()->get();

        return view('admin.list', ['posts' => $posts]);
    }

    public function show(Post $post)
    {
        // $post = Post::findOrFail($id);
        return view('admin.show', ['post' => $post]);
    }

    public function create(){

        $category = new Category();
        $category = $category->getCategoryList();

        return view('admin.create', ['category' => $category]);
    }

    /**
     * 記事の保存
     */
    public function store(PostRequest $request){

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

        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->image = $filename;
        $post->category_id = $request->category;
        $post->user_id = 1;
        $post->save();
        return redirect('/post/list');
    }

    public function edit(Post $post){
        return view('admin.edit', ['post' => $post]);
    }

    public function update(PostRequest $request, Post $post){

        $post->title = $request->title;
        $post->content = $request->content;
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
    public function category()
    {

        $category = new Category();

        $category = $category->getCategoryList(self::NUM_PER_PAGE);
        return view('categories.category', ['category' => $category]);
    }

    public function categoryCreate(){
        return view('categories.create');
    }

    /**
     * カテゴリ新規作成API
     */
    public function categoryStore(PostRequest $request){

        $category = new Category();
        $category->name = $request->name;
        $category->display_order = $request->display_order;
        $category->save();
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
