@extends('layouts.app')

@section('title', $article->title)

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden mb-8">
            <a href="{{ route('categories.show', $article->category->slug) }}"
               class="inline-block px-4 py-2 text-sm font-semibold m-6"
               style="background-color: {{ $article->category->color }}; color: white; border-radius: 9999px;">
                {{ $article->category->name }}
            </a>
            <div class="px-6 pb-6">
                <h1 class="text-4xl font-bold mb-4">{{ $article->title }}</h1>
                <div class="flex items-center text-gray-600 mb-6">
                    <span class="font-semibold">{{ $article->user->name }}</span>
                    <span class="mx-2">•</span>
                    <span>{{ $article->published_at->format('F d, Y') }}</span>
                    <span class="mx-2">•</span>
                    <span>{{ $article->views_count }} views</span>
                    <span class="mx-2">•</span>
                    <span>{{ $article->read_time }} min read</span>
                </div>
                @if($article->featured_image)
                <img src="{{ Storage::url($article->featured_image) }}" alt="{{ $article->title }}"
                     class="w-full rounded-lg mb-6">
                @endif
                <div class="prose prose-lg max-w-none">
                    {!! $article->content !!}
                </div>
                @if($article->tags->isNotEmpty())
                <div class="mt-8 pt-6 border-t">
                    <div class="flex flex-wrap gap-2">
                        @foreach($article->tags as $tag)
                        <span class="px-3 py-1 bg-gray-200 text-gray-700 rounded-full text-sm">
                            #{{ $tag->name }}
                        </span>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>

        @if($relatedArticles->isNotEmpty())
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-2xl font-bold mb-6">Related Articles</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($relatedArticles as $related)
                <div class="flex space-x-4">
                    @if($related->featured_image)
                    <img src="{{ Storage::url($related->featured_image) }}" alt="{{ $related->title }}"
                         class="w-24 h-24 object-cover rounded">
                    @else
                    <div class="w-24 h-24 bg-gray-300 rounded"></div>
                    @endif
                    <div class="flex-1">
                        <a href="{{ route('articles.show', $related->slug) }}"
                           class="font-semibold hover:text-red-600 transition">
                            {{ $related->title }}
                        </a>
                        <div class="text-sm text-gray-500 mt-1">
                            {{ $related->published_at->diffForHumans() }}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
