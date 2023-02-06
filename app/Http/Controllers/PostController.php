<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use App\Models\Post;
class PostController extends Controller
{
    function index(){
        // $posts = Post::paginate(8);
        $posts = Post::get();

        return view("posts.index",[
                "posts" => $posts
        ]);
    }
    function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);


        auth()->user()->posts()->create([
            'body' => $request->body,
        ]);

        return back();
    }
    function destroy(Post $post,Request $request){
        if ($post->user->id != auth()->user()->id)
            return back();
        $post->delete();
        return back();
    }
  
}
