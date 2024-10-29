<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert([

            ['user_name' => 'aaa', 'contents' => '1つ目の投稿になります'],

            ['user_name' => 'bbb', 'contents' => 'Laravelの投稿ページを作りました'],

            ['user_name' => 'ccc', 'contents' => '投稿についてのCRUD一式を作っています'],

            ['user_name' => 'ddd', 'contents' => 'MVCの役割を体験中です'],

            ['user_name' => 'eee', 'contents' => '初期レコードがこれで終わりです。']

        ]);
    }
}
