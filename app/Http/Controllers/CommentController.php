<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Article;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Article $article)
    {
        $validated = $request->validate([
            'content' => 'required|min:3',
        ]);

        $comment = new Comment($validated);
        $comment->article_id = $article->id;

        if (auth()->check()) {
            $comment->user_id = auth()->id();
        } else {
            $request->validate([
                'author_name' => 'required|max:255',
                'author_email' => 'required|email',
            ]);
            $comment->author_name = $request->author_name;
            $comment->author_email = $request->author_email;
        }

        $comment->status = 'pending';
        $comment->save();

        return back()->with('success', 'Your comment has been submitted and is awaiting moderation.');
    }

    public function approve(Comment $comment)
    {
        $comment->update(['status' => 'approved']);
        return back()->with('success', 'Comment approved.');
    }

    public function reject(Comment $comment)
    {
        $comment->update(['status' => 'rejected']);
        return back()->with('success', 'Comment rejected.');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return back()->with('success', 'Comment deleted.');
    }
}
