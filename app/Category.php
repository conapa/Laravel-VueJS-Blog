<?php

namespace App;
use app\Post;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public $guarded =[''];
    public function posts(){
      return $this->HasMany(Post::class);
    }
}
