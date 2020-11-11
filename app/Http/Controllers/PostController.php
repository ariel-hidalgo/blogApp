<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at' , 'desc')->get();
        return view('posts.index' , [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create' , Post::class);
        $users = User::all();
        $categories = Category::all();
        return view('posts.create' , [
            'categories' => $categories,
            'users' => $users
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create' , Post::class);
        $input = $request->all();
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'user_id' => ['required', 'exists:App\Models\User,id']
        ]);
        Post::create($input);
        return redirect('posts');
        //$input['user_id']; //$request->user()->id; or Auth::user() if the request is not accessible (just one user)
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $this->authorize('update' , $post);
        $users = User::all();
        $categories = Category::all();
        return view('posts.edit', [
            'post' => $post,
            'categories' => $categories,
            'users' => $users
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->authorize('update' , $post);
        $input = $request->all();
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'user_id' => ['required', 'exists:App\Models\User,id']
        ]);
        $post->update($input);
        return back()->with('success' , 'Post Actualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete' , $post);
        $post->delete();
        return redirect('posts');
    }

    
}
