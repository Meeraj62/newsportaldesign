<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function show($slug)
    {
        $category = Category::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $articles = $category->publishedArticles()
            ->with(['user', 'tags'])
            ->latest('published_at')
            ->paginate(12);

        return view('categories.show', compact('category', 'articles'));
    }
}
