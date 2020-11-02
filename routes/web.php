<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/admin', function () {
    return view('welcome');
}); 

Route::get('/' , function(){
    return redirect('blogs');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('posts' , PostController::class);
Route::resource('blogs' , BlogController::class);
Route::resource('categories' , CategoryController::class);

Route::get('/music' , function (){
    return view('blogs.music');
});

Route::get('/films' , function (){
    return view('blogs.films');
});

Route::get('/series' , function (){
    return view('blogs.series');
});

Route::get('/anime' , function (){
    return view('blogs.anime');
});