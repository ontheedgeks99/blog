<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * モデルと関連しているテーブル
     *
     * @var string
     */
    protected $table = 'posts';

    /**
     * テーブルの主キー
     *
     * @var string
     */
    protected $primaryKey = 'post_id';

    /**
     * fillable設定
     *
     * @var string
     */
    protected $fillable = ['user_id','title','content','category'];

}
