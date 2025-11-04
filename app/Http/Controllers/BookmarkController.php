<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function toggle($articleId)
    {
        $userId = auth()->id();
        $bookmark = Bookmark::where('user_id', $userId)
            ->where('article_id', $articleId)
            ->first();

        if ($bookmark) {
            $bookmark->delete();
            return response()->json(['message' => 'Bookmark removed', 'bookmarked' => false]);
        } else {
            Bookmark::create([
                'user_id' => $userId,
                'article_id' => $articleId,
            ]);
            return response()->json(['message' => 'Article bookmarked', 'bookmarked' => true]);
        }
    }

    public function index()
    {
        $bookmarks = auth()->user()->bookmarks()->with(['article.category', 'article.user'])->latest()->paginate(12);
        return view('bookmarks.index', compact('bookmarks'));
    }
}
