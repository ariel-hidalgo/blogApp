<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $posts = Post::all();
        return view('blogs.index' , [
            'posts' => $posts
        ]);
    }

    public function music(){
        return view('blogs.music');
    }
}
