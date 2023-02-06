<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostLikeController extends Controller
{
    function store(Post $post,Request $request)
    {
        if($post->likedBy($request->user())){
            return back();
        }
        $post->likes()->create([
            'user_id' => $request->user()->id,
        ]);

        return back();

    }
    function destroy(Post $post,Request $request){
        $post->likes()->where('user_id', $request->user()->id)->delete();
        return back();
    }
}
