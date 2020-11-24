<?php

use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Comment::create([
          'user_id'=>1,
          'post_id'=>1,
          'body' => 'hada 1 comment la la la inaho comment hhh',
        ]);
        \App\Comment::create([
          'user_id'=>1,
          'post_id'=>1,
          'body' => 'hada 2 comment la la la inaho comment hhh',
        ]);
        \App\Comment::create([
          'user_id'=>1,
          'post_id'=>1,
          'body' => 'hada 3 comment la la la inaho comment hhh',
        ]);
    }
}
