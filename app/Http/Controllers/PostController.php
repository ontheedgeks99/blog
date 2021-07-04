<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    //
    public function index(Request $request)
    {
        $posts = Post::latest()->get(); //新しいものから取得
        // dd($posts->toArray()); //dump die
        return view('posts.index', ['posts' => $posts]);
    }

    public function show(Post $post)
    {
        // $post = Post::findOrFail($id);
        return view('posts.show', ['post' => $post]);
    }

    public function create(){
        return view('posts.create');
    }

    public function store(PostRequest $request){

        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = 1;
        $post->category = 1;
        $post->save();
        return redirect('/post');
    }

    public function edit(Post $post){
        return view('posts.edit', ['post' => $post]);
    }

    public function update(PostRequest $request, Post $post){

        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = 1;
        $post->category = 1;
        $post->save();
        return redirect('/post');
    }

    public function destroy(Post $post){
        $post->delete();
        return redirect('/post');
    }
}
