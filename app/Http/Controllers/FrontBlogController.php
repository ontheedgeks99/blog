<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Models\Post;
use App\Models\Category;
use App\Models\Profile;
use App\Models\Portfolio;
use App\Http\Requests\FrontBlogRequest;

class FrontBlogController extends Controller
{
    //
    protected $post;
    protected $category;
    protected $profile;
    
    const NUM_PER_PAGE = 3;

    function __construct(Post $post, Category $category, Profile $profile, Portfolio $portfolio)
    {
        $this->post = $post;
        $this->category = $category;
        $this->profile = $profile;
        $this->portfolio = $portfolio;
    }
    

    /**
     * ブログトップページ
     * 
     * @return 
     */
    function index(FrontBlogRequest $request)
    {
        // 日付パラメータを取得
        $input = $request->input();

        // ブログ記事一覧を取得
        $posts = $this->post->getPostList(self::NUM_PER_PAGE, $input);
        
        // ページネーションリンクにクエリストリングを付け加える
        $posts->appends($input);

        // カテゴリ一覧を取得
        $category_list = $this->category->getCategoryList();

        // プロフィール一覧を取得
        $profile_list = $this->profile->getProfileList(2);

        // ポートフォリオ一覧を取得
        $portfolio_list = $this->portfolio->get();

        // 月別アーカイブの対象月リストを取得
        $month_list = $this->post->getMonthList();

        return view('posts.index', ['posts' => $posts,'category_list' => $category_list, 'month_list' => $month_list, 'profile_list' => $profile_list, 'portfolios' => $portfolio_list]);
    }

    /**
     * カテゴリーページ
     * 
     * @return 
     */
    function index_other(FrontBlogRequest $request)
    {

        $num_per_page = 12;

        // 日付パラメータを取得
        $input = $request->input();

        $category_id = array_get($input, 'category_id');
        $year = array_get($input, 'year');
        $month = array_get($input, 'month');

        if($category_id){
            if((int)$category_id === 1 ){
                $subtitle = 'カテゴリー：書評';
            } else {
                $subtitle = 'カテゴリー：エンジニア';
            }

        }

        if($year && $month) {

            $subtitle = 'アーカイブ：' . $year . '年' . $month . '月';

        }

        // ブログ記事一覧を取得
        $posts = $this->post->getPostList($num_per_page, $input);
        
        // ページネーションリンクにクエリストリングを付け加える
        $posts->appends($input);

        // カテゴリ一覧を取得
        $category_list = $this->category->getCategoryList();

        // プロフィール一覧を取得
        $profile_list = $this->profile->getProfileList(2);

        // ポートフォリオ一覧を取得
        $portfolio_list = $this->portfolio->get();

        // 月別アーカイブの対象月リストを取得
        $month_list = $this->post->getMonthList();

        return view('posts.index_other', ['posts' => $posts,'category_list' => $category_list, 'month_list' => $month_list, 'profile_list' => $profile_list, 'subtitle' => $subtitle, 'portfolios' => $portfolio_list]);
    }

    /**
     * プロフィールページ
     * 
     * @return 
     */
    function profile(FrontBlogRequest $request)
    {
        // 日付パラメータを取得
        $input = $request->input();

        // ブログ記事一覧を取得
        $posts = $this->post->getPostList(self::NUM_PER_PAGE, $input);
        
        // ページネーションリンクにクエリストリングを付け加える
        $posts->appends($input);

        // カテゴリ一覧を取得
        $category_list = $this->category->getCategoryList();

        // プロフィール一覧を取得
        $profile_list = $this->profile->getProfileList(2);

        // ポートフォリオ一覧を取得
        $portfolio_list = $this->portfolio->get();

        // 月別アーカイブの対象月リストを取得
        $month_list = $this->post->getMonthList();

        return view('posts.profile', ['posts' => $posts,'category_list' => $category_list, 'month_list' => $month_list, 'profile_list' => $profile_list, 'portfolios' => $portfolio_list]);
    }

    /**
     * プロフィールページ
     * 
     * @return 
     */
    function portfolio(FrontBlogRequest $request)
    {
        // 日付パラメータを取得
        $input = $request->input();

        // ブログ記事一覧を取得
        $posts = $this->post->getPostList(self::NUM_PER_PAGE, $input);
        
        // ページネーションリンクにクエリストリングを付け加える
        $posts->appends($input);

        // カテゴリ一覧を取得
        $category_list = $this->category->getCategoryList();

        // プロフィール一覧を取得
        $profile_list = $this->profile->getProfileList(2);

        // ポートフォリオ一覧を取得
        $portfolio_list = $this->portfolio->get();

        // 月別アーカイブの対象月リストを取得
        $month_list = $this->post->getMonthList();

        return view('posts.portfolio', ['posts' => $posts,'category_list' => $category_list, 'month_list' => $month_list, 'profile_list' => $profile_list, 'portfolios' => $portfolio_list]);
    }


}
