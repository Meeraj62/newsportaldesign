<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticleController extends Controller
{
    public function show($slug)
    {
        $article = Article::where('slug', $slug)
            ->published()
            ->with(['category', 'user', 'tags'])
            ->firstOrFail();

        $article->incrementViews();

        $relatedArticles = Article::published()
            ->where('category_id', $article->category_id)
            ->where('id', '!=', $article->id)
            ->with(['category', 'user'])
            ->latest('published_at')
            ->take(4)
            ->get();

        return view('articles.show', compact('article', 'relatedArticles'));
    }

    public function search()
    {
        $query = request('q');

        $articles = Article::published()
            ->where(function($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                  ->orWhere('excerpt', 'like', "%{$query}%")
                  ->orWhere('content', 'like', "%{$query}%");
            })
            ->with(['category', 'user'])
            ->latest('published_at')
            ->paginate(12);

        return view('articles.search', compact('articles', 'query'));
    }
}
