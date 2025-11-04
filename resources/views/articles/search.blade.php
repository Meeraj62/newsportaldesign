@extends('layouts.app')

@section('title', 'Search Results')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-4xl font-bold mb-2">Search Results</h1>
    <p class="text-gray-600 mb-8">Found {{ $articles->total() }} results for "{{ $query }}"</p>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($articles as $article)
        <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition">
            @if($article->featured_image)
            <img src="{{ Storage::url($article->featured_image) }}" alt="{{ $article->title }}"
                 class="w-full h-48 object-cover">
            @else
            <div class="w-full h-48 bg-gradient-to-r from-gray-400 to-gray-600"></div>
            @endif
            <div class="p-6">
                <a href="{{ route('categories.show', $article->category->slug) }}"
                   class="inline-block px-3 py-1 text-xs font-semibold rounded-full mb-2"
                   style="background-color: {{ $article->category->color }}; color: white;">
                    {{ $article->category->name }}
                </a>
                <a href="{{ route('articles.show', $article->slug) }}">
                    <h3 class="text-xl font-bold mb-2 hover:text-red-600 transition">{{ $article->title }}</h3>
                </a>
                <p class="text-gray-600 mb-4">{{ Str::limit($article->excerpt, 100) }}</p>
                <div class="flex items-center text-sm text-gray-500">
                    <span>{{ $article->user->name }}</span>
                    <span class="mx-2">•</span>
                    <span>{{ $article->published_at->format('M d, Y') }}</span>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-full text-center py-12">
            <p class="text-gray-600 text-lg">No articles found matching your search.</p>
        </div>
        @endforelse
    </div>

    @if($articles->hasPages())
    <div class="mt-8">
        {{ $articles->links() }}
    </div>
    @endif
</div>
@endsection
