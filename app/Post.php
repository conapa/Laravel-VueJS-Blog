<?php

namespace App;
use App\User;
use app\Category;
use app\Comment;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    public $guarded =[''];
    public function categories(){
      return $this->belongsTo(Category::class);
    }
    public function users(){
      return $this->belongsTo(User::class);
    }
    public function comments(){
      return $this->HasMany(Comment::class);
    }
    public function getRouteKeyName(){
      return 'slug';
    }
}
