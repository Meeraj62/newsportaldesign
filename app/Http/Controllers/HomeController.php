<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $breakingNews = Article::published()
            ->breaking()
            ->with(['category', 'user'])
            ->latest('published_at')
            ->first();

        $featuredArticles = Article::published()
            ->featured()
            ->with(['category', 'user'])
            ->latest('published_at')
            ->take(3)
            ->get();

        $latestArticles = Article::published()
            ->with(['category', 'user', 'tags'])
            ->latest('published_at')
            ->paginate(12);

        $categories = Category::where('is_active', true)
            ->orderBy('order')
            ->get();

        $trendingArticles = Article::published()
            ->with(['category', 'user'])
            ->orderBy('views_count', 'desc')
            ->take(5)
            ->get();

        return view('home', compact(
            'breakingNews',
            'featuredArticles',
            'latestArticles',
            'categories',
            'trendingArticles'
        ));
    }
}
