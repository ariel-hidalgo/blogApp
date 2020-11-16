<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostAPIController extends Controller
{
    public function index(Request $request){
        $posts = Post::where('user_id', $request->user()->id)->get();

        return response()->json($posts);
    }
}
