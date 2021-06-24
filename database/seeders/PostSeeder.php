<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_id' => 1,
            'title' => 'テスト',
            'content' => 'テストです。',
            'status' => 0,
            'category' => 1,
        ];
        DB::table('posts')->insert($param);
    }
}
