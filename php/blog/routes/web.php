<?php

use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
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

Route::get('/', function () {
    \Illuminate\Support\Facades\DB::listen(function($query) {
//        \Illuminate\Support\Facades\Log::info("queryyyyy");
        logger($query->sql, $query->bindings);
    });
    return view('posts', [
        "posts" => Post::latest()->get(),
        "categories" => Category::all()
    ]);
});

Route::get('posts/{post:slug}', function (Post $post) { // laravel behind the scenes Post::find($post)->firstOrFail();
    return view("post", [
        "post" => $post,
        "categories" => Category::all()
    ]);
});

Route::get("categories/{category:slug}", function (Category $category) {
   return view("posts", [
       "posts" => $category->posts,
       "currentCategory" => $category,
       "categories" => Category::all()
   ]);
});

Route::get("authors/{author:username}", function (\App\Models\User $author) {
    return view("posts", [
        "posts" => $author->posts,
        "categories" => Category::all()
    ]);
});
