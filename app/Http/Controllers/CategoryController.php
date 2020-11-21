<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $categories = Category::orderBy('created_at' , 'desc')->get();
        return view('categories.index' , [
            'categories' => $categories,
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create' , Category::class);
        $users = User::all();
        return view('categories.create' , [
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
        $input = $request->all();
        $request->validate([
            'name_category' => 'required',
            'user_id' => ['required', 'exists:App\Models\User,id']
        ]);
        Category::create($input);
        return redirect('categories');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $this->authorize('update' , $category);
        $users = User::all();
        return view('categories.edit' , [
            'category' => $category,
            'users' => $users
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->authorize('update' , $category);
        $input = $request->all();
        $request->validate([
            'name_category' => 'required',
            'user_id' => ['required', 'exists:App\Models\User,id']
        ]);
        $category->update($input);
        return back()->with('success' , 'Categoría Actualizada!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $this->authorize('delete' , $category);
        $category->delete();
        return redirect('categories');
    }

}