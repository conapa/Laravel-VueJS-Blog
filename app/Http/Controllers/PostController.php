<?php

namespace App\Http\Controllers;
use App\User;
use App\Post;
use App\Comment;
use App\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::latest()->paginate(3);
        foreach ($posts as $post) {
          $user = User::whereId($post->user_id)->first();
          $comments = Comment::query()->where('post_id', $post->id)->get();
          $post ->setAttribute('username',$user->name);
          $post ->setAttribute('comments_count',$comments->count());
          $post->setAttribute('added_at',$post->created_at->diffForHumans());
        }
        return response()->json($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
        $user = User::whereId($post->user_id)->first();
        $comments = Comment::query()->where('post_id', $post->id)->get();
        $category = Category::query()->where('id', $post->category_id)->get();

        return response()->json([
          'id'=>$post->id,
          'slug'=>$post->slug,
          'body'=>$post->body,
          'added_at'=>$post->created_at->diffForHumans(),
          'comments_count'=>$comments->count(),
          'image'=>$post->image,
          'user'=>$user,
          'title'=>$post->title,
          'category'=>$category,
          'comments'=>$this->commentsFormatted($comments)

        ]);
    }

    public function commentsFormatted($comments){
      $new_comments =[];
      foreach($comments as $comment)
      {
        $user = User::whereId($comment->user_id)->first();
        array_push($new_comments,[
          'id'=>$comment->id,
          'slug'=>$comment->slug,
          'body'=>$comment->body,
          'user'=>$user,
          'added'=>$comment->created_at->diffForHumans()
        ]);
      }
      return $new_comments;
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
    public function categoryPosts($slug){

        $category = Category::whereSlug($slug)->first();
        $posts = Post::whereCategoryId($category->id)->get();
        foreach($posts as $post){
            $user = User::whereId($post->user_id)->first();
            $comments = Comment::query()->where('post_id', $post->id)->get();
            $post ->setAttribute('username',$user->name);
            $post->setAttribute('added_at',$post->created_at->diffForHumans());
            $post ->setAttribute('comments_count',$comments->count());
        }
        return response()->json($posts);
    }
    public function searchposts($query){
        $posts = Post::where('title','like','%'.$query.'%')->paginate(3);
        //get all rows //count

        foreach($posts as $post){
          $user = User::whereId($post->user_id)->first();
          $comments = Comment::query()->where('post_id', $post->id)->get();
          $post ->setAttribute('username',$user->name);
          $post ->setAttribute('comments_count',$comments->count());
          $post->setAttribute('added_at',$post->created_at->diffForHumans());
        }
        return response()->json($posts);
    }
}
