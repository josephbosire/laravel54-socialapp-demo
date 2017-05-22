<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;

class PostController extends Controller
{
    public function store(Request $request){
        return Post::create([
            'user_id'=> Auth::id(),
            'content'=> $request->content
        ]);
    }
}
