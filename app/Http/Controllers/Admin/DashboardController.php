<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_articles' => Article::count(),
            'published_articles' => Article::where('status', 'published')->count(),
            'draft_articles' => Article::where('status', 'draft')->count(),
            'total_categories' => Category::count(),
            'total_tags' => Tag::count(),
            'total_users' => User::count(),
        ];

        $recentArticles = Article::with(['category', 'user'])
            ->latest()
            ->take(10)
            ->get();

        $popularArticles = Article::published()
            ->with(['category', 'user'])
            ->orderBy('views_count', 'desc')
            ->take(10)
            ->get();

        return view('admin.dashboard', compact('stats', 'recentArticles', 'popularArticles'));
    }
}
