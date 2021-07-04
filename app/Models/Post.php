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
     * fillable設定
     *
     * @var string
     */
    protected $fillable = ['user_id','title','content','category'];

    public function comments() {
        return $this->hasMany('App\Models\Comment');
    }

}
