<?php

namespace App;
use app\User;
use app\Post;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    public $guarded =[''];
    public function posts(){
      return $this->belongsTo(Post::class);
    }
    public function users(){
      return $this->belongsTo(User::class);
    }
}
