<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts = Post::latest()->get();
        return view("index", [
            "posts" => $posts
        ]);
    }

    public function store(Request $request) {
       Post::create([
           "user_id" => 1,
           "title" => $request->get('title'),
           "content" => $request->get("content"),
           "image" => 'imagesasd'
       ]);
       return redirect('/posts');
    }

    public function create() {
        return view("create");

    }

    public function show(Post $post) {
        return view("post", [
            "post" => $post
        ]);
    }

    public function update() {

    }

    public function destroy(Post $post) {
        $post->delete();
        return redirect(route("posts.index"));
    }

    public function edit() {

    }
}
