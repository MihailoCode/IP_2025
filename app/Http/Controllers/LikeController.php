<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function togglePost(Request $request, $id) {
        $post = Post::findOrFail($id);
        $this->toggleLike($request->user(), $post);
        return back();
    }

    public function toggleComment(Request $request, $id) {
        $comment = Comment::findOrFail($id);
        $this->toggleLike($request->user(), $comment);
        return back();
    }

    protected function toggleLike($user, $likeable) {
        $like = $likeable->likes()->where('user_id', $user->id)->first();

        if ($like) {
            $like->delete();
        } else {
            $likeable->likes()->create(['user_id' => $user->id]);
        }
    }
}