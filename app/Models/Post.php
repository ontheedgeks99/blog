<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    /**
     * モデルと関連しているテーブル
     *
     * @var string
     */
    protected $table = 'posts';


    /**
     * fillable設定
     *
     * @var string
     */
    protected $fillable = ['user_id','title','content','category_id'];

    // $post->commentsのようにアクセスできるようにする
    public function comments() {
        return $this->hasMany('App\Models\Comment');
    }

    // $post->categoryのようにアクセスできるようにする
    public function category()
    {
        // 1つのカテゴリーは多くの記事と関係しているのでhasManyメソッドを利用する
        return $this->hasOne('App\Models\Category', 'category_id', 'category_id');
    }

    /**
     * 記事リストを取得
     * 
     * @param int $num_per_page 1ページ当たりの表示件数
     * @param array $condition 検索条件
     * @return Illuminate\Pagination\LengthAwarePaginator
     */
    public function getPostList(int $num_per_page = 10, array $condition = [])
    {
        // パラメータの取得
        // ヘルパ関数
        $post_id = array_get($condition, 'id');
        $category_id = array_get($condition, 'category_id');
        $year = array_get($condition, 'year');
        $month = array_get($condition, 'month');

        // with関数で子テーブルも取得
        $query = $this->with('category')->orderBy('id', 'desc');

        if($post_id){
            $query->where('id', $post_id);
        }

        if($category_id){
            $query->where('category_id', $category_id);
        }

        // 期間の指定
        if ($year) {
            if ($month) {
                // 月の指定がある場合は、その月の1日を設定し、Carbonインスタンスを生成
                $start_date = Carbon::createFromDate($year, $month, 1);
                $end_date = Carbon::createFromDate($year, $month, 1)->addMonth(); //月をプラス１する
            } else {
                // 月の指定が無い場合は１月１日に設定し、Carbonインスタンスを生成
                $start_date = Carbon::createFromDate($year, 1, 1);
                $end_date = Carbon::createFromDate($year, 1, 1)->addYear(); //年をプラス１する
            }
            // Where句を追加
            $query->where('created_at', '>=', $start_date->format('Y-m-d'))
                  ->where('created_at', '<', $end_date->format('Y-m-d'));

        }

        // return $this->orderBy('id', 'desc')->paginate($num_per_page);
        return $query->paginate($num_per_page);
    }

    /**
     * 月別アーカイブの作成
     */
    public function getMonthList() {
        // substringでyyyy-mmを切り取り →year_and_mathというカラム名で取得
        $month_list = $this->selectRaw('substring(created_at, 1,7) AS year_and_month ')
        ->groupBy('year_and_month')
        ->orderBy('year_and_month', 'desc')
        ->get();

        foreach ( $month_list as $value ) {
            // yyyy-mmをハイフンで分解して、yyyy年mm月という表記を作る
            list($year, $month) = explode('-', $value->year_and_month);
            $value->year = $year;
            $value->month = (int)$month;
            $value->year_month = sprintf("%04d年%02d月", $year, $month);
        }

        return $month_list;
    }

}
