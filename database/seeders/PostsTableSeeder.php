<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $posts = [
           'user_id' => function () {
               return \App\Models\User::pluck('id')
                   ->random(1)
                   ->first();
           },
           'content' => 'abc',
           'votes' => 100,
           'view_count' => 100,
       ];
        foreach ($posts as $post){
            DB::table('posts')->insert($post);
        }
    }
}
