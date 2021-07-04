<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class CommentsController extends Controller
{
    //
    public function store(Request $request, Post $post) {
        $this->validate($request, [
            'content' => 'required'
        ]);

        $comment = new Comment(['content'=> $request->content]);
        $post->comments()->save($comment);
        return redirect('/post/'. $post->id );
    }

    public function destroy(Post $post, Comment $comment) {
        $comment->delete();
        return redirect()->back();
    }

}
