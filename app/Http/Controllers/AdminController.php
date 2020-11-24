<?php

namespace App\Http\Controllers;
use App\Post;
use App\Category;
use App\Comment;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Str;
use DB;
class AdminController extends Controller
{
    //
    public function __construct(){
        $this->middleware('admin');
    }
    public function getPosts(){
      $posts = Post::latest()->paginate(3);
      foreach ($posts as $post) {
        $user = User::whereId($post->user_id)->first();
        $category = Category::whereId($post->category_id)->first();
        $comments = Comment::query()->where('post_id', $post->id)->get();
        $post ->setAttribute('username',$user->name);
        $post ->setAttribute('category',$category);
        $post ->setAttribute('comments_count',$comments->count());
        $post->setAttribute('added_at',$post->created_at->diffForHumans());
      }
      return response()->json($posts);
    }
    public function getCategories(){
        $categories  = Category::get();
        return response()->json($categories);
    }
    public function addPost(Request $request){
         $filename = '';
        if($request->hasFile('image')){
           $filename = time().'.'.$request->image->getClientOriginalExtension();
           $request->image->move(public_path('img'),$filename);
        }
        $post = Post::create([
            'title'=>$request->title,
            'slug'=>Str::slug($request->title),
            'body'=>$request->body,
            'category_id'=>$request->category,
            'user_id'=>Auth::id(),
            'image'=>$filename,
        ]);
        return response()->json($post);
    }
    public function updatePost(Request $request){
        $post = Post::find($request->id);
         $filename = $post->image;
        if($request->hasFile('image')){
           $filename = time().'.'.$request->image->getClientOriginalExtension();
           $request->image->move(public_path('img'),$filename);
        }

        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->body = $request->body;
        $post->category_id = $request->category;
        $post->image = $filename != '' ? $filename : $post->image;
        $post->save();
        return response()->json($post);
    }
    public function deletePosts(Request $request){
       $ids = $request->posts_ids;
       DB::table('posts')->whereIn('id',$ids)->delete();
       DB::table('comments')->whereIn('post_id',$ids)->delete();
       return response()->json(['message'=>'deleted']);
    }
}
