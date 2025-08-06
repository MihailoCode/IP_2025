<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts = Post::with('user', 'likes')->latest()->get();
        return view('posts.index', compact('posts'));
    }

    public function create() {
        return view('posts.create');
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $request->user()->posts()->create($request->only('title', 'body'));
        return redirect()->route('posts.index');
    }

    public function show($id) {
        $post = Post::with(['comments.user', 'likes', 'comments.likes'])->find($id);

        if (!$post || ($post->trashed() && !auth()->user()->isAdmin())) {
            return redirect()->route('posts.index');
        }

        return view('posts.show', compact('post'));
    }
}
