@extends('layouts.app')

@section('title', $category->name)

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="mb-8">
        <h1 class="text-4xl font-bold mb-2">{{ $category->name }}</h1>
        @if($category->description)
        <p class="text-gray-600">{{ $category->description }}</p>
        @endif
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($articles as $article)
        <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition">
            @if($article->featured_image)
            <img src="{{ Storage::url($article->featured_image) }}" alt="{{ $article->title }}"
                 class="w-full h-48 object-cover">
            @else
            <div class="w-full h-48 bg-gradient-to-r from-gray-400 to-gray-600"></div>
            @endif
            <div class="p-6">
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
        @endforeach
    </div>

    <div class="mt-8">
        {{ $articles->links() }}
    </div>
</div>
@endsection
