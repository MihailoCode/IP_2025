<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        $deletedPosts = Post::onlyTrashed()->with('user')->get();
        $deletedComments = Comment::onlyTrashed()->with('user')->get();
        return view('admin.dashboard', compact('deletedPosts', 'deletedComments'));
    }

    public function promote($id) {
        $user = User::findOrFail($id);
        $user->update(['role' => 'admin']);
        return back();
    }

    public function destroyPost($id) {
        $post = Post::findOrFail($id);
        $post->delete();
        return back();
    }

    public function destroyComment($id) {
        $comment = Comment::findOrFail($id);
        $comment->delete();
        return back();
    }
}
