<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $id) {
        $request->validate(['body' => 'required|string']);

        $post = Post::findOrFail($id);

        $post->comments()->create([
            'body' => $request->body,
            'user_id' => $request->user()->id
        ]);

        return back();
    }
}
