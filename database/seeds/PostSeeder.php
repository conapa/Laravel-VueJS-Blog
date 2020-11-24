<?php

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Post::create([
          'title'=>'Post 1',
          'slug' =>Str::slug('Post 1'),
          'body' =>'salama labas hada hwa lbody dyal lpostsalama labas hada hwa lbody dyal lpost salama labas hada hwa lbody
           dyal lpost salama labas hada hwa lbody dyal lpost
          salama labas hada hwa lbody dyal lpostsalama labas hada hwa lbody dyal lpostsalama labas hada hwa lbody dyal
          lpostsalama labas hada hwa lbody dyal lpost ',
          'image' => 'p1.png',
          'user_id' => 1,
          'category_id' =>1,
        ]);
        \App\Post::create([
          'title'=>'Post 2',
          'slug' =>Str::slug('Post 2'),
          'body' =>'salama labas hada hwa lbody dyal lpostsalama labas hada hwa lbody dyal lpost salama labas hada hwa lbody
           dyal lpost salama labas hada hwa lbody dyal lpost
          salama labas hada hwa lbody dyal lpostsalama labas hada hwa lbody dyal lpostsalama labas hada hwa lbody dyal
          lpostsalama labas hada hwa lbody dyal lpost ',
          'image' => 'p1.png',
          'user_id' => 1,
          'category_id' =>1,
        ]);
        \App\Post::create([
          'title'=>'Post 3',
          'slug' =>Str::slug('Post 3'),
          'body' =>'salama labas hada hwa lbody dyal lpostsalama labas hada hwa lbody dyal lpost salama labas hada hwa lbody
           dyal lpost salama labas hada hwa lbody dyal lpost
          salama labas hada hwa lbody dyal lpostsalama labas hada hwa lbody dyal lpostsalama labas hada hwa lbody dyal
          lpostsalama labas hada hwa lbody dyal lpost ',
          'image' => 'p1.png',
          'user_id' => 1,
          'category_id' =>2,
        ]);
        \App\Post::create([
          'title'=>'Post 4',
          'slug' =>Str::slug('Post 4'),
          'body' =>'salama labas hada hwa lbody dyal lpostsalama labas hada hwa lbody dyal lpost salama labas hada hwa lbody
           dyal lpost salama labas hada hwa lbody dyal lpost
          salama labas hada hwa lbody dyal lpostsalama labas hada hwa lbody dyal lpostsalama labas hada hwa lbody dyal
          lpostsalama labas hada hwa lbody dyal lpost ',
          'image' => 'p1.png',
          'user_id' => 1,
          'category_id' =>1,
        ]);

    }
}
