<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $primaryKey = 'profile_id';

    protected $fillable = ['profile_id','image','content'];

    /**
     * プロフィールを取得する
     * 
     * @param int $profile_id プロフィール番号
     * @return mixed
     */
    public function getProfileList(int $profile_id)
    {
        return $this->where('profile_id', $profile_id)->get();
    }

    
}
