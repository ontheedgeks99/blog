<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    // use SoftDeletes;

    protected $primaryKey = 'category_id'; // id名を変更したため定義
    protected $fillable = ['name', 'display_order']; // 変更可能な値
    protected $dates = ['deleted_at', 'created_at','updated_at'];

    // $category->postsのようにアクセスできるようにする
    public function posts()
    {
        // 記事は1つのカテゴリーと関係しているので、hasOneメソッドを利用する
        return $this->hasMany('App\Models\Post', 'category_id', 'category_id');
    }

    /**
     * カテゴリリストを取得する
     * 
     * @param int $num_per_page 1ページ当たりの表示件数
     * @param string $order 並び順の基準となるカラム
     * @param string $direction 並び順の向き asc or desc
     * @return mixed
     */
    public function getCategoryList(int $num_per_page=0, string $order = 'display_order', string $direction = 'asc')
    {
        $query = $this->orderBy($order, $direction);
        if ($num_per_page) {
            // $num_per_pageが０以外のとき
            return $query->paginate($num_per_page);
        }
        return $query->get();
    }

}
