@extends('layouts.app')

@section('title', 'Home - Latest News')

@section('content')
<div class="container mx-auto px-4 py-8">
    @if($breakingNews)
    <div class="bg-red-600 text-white p-6 rounded-lg mb-8 shadow-lg">
        <div class="flex items-center mb-2">
            <span class="bg-white text-red-600 px-3 py-1 rounded-full text-sm font-bold mr-3">BREAKING NEWS</span>
            <span class="text-sm opacity-90">{{ $breakingNews->published_at->diffForHumans() }}</span>
        </div>
        <a href="{{ route('articles.show', $breakingNews->slug) }}" class="text-2xl font-bold hover:underline">
            {{ $breakingNews->title }}
        </a>
    </div>
    @endif

    @if($featuredArticles->isNotEmpty())
    <div class="mb-12">
        <h2 class="text-3xl font-bold mb-6 border-b-4 border-red-600 inline-block pb-2">Featured Stories</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($featuredArticles as $article)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition">
                @if($article->featured_image)
                <img src="{{ Storage::url($article->featured_image) }}" alt="{{ $article->title }}"
                     class="w-full h-48 object-cover">
                @else
                <div class="w-full h-48 bg-gradient-to-r from-red-500 to-red-700"></div>
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
            @endforeach
        </div>
    </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2">
            <h2 class="text-3xl font-bold mb-6 border-b-4 border-red-600 inline-block pb-2">Latest News</h2>
            <div class="space-y-6">
                @foreach($latestArticles as $article)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition flex">
                    @if($article->featured_image)
                    <img src="{{ Storage::url($article->featured_image) }}" alt="{{ $article->title }}"
                         class="w-48 h-48 object-cover">
                    @else
                    <div class="w-48 h-48 bg-gradient-to-r from-gray-400 to-gray-600"></div>
                    @endif
                    <div class="p-6 flex-1">
                        <a href="{{ route('categories.show', $article->category->slug) }}"
                           class="inline-block px-3 py-1 text-xs font-semibold rounded-full mb-2"
                           style="background-color: {{ $article->category->color }}; color: white;">
                            {{ $article->category->name }}
                        </a>
                        <a href="{{ route('articles.show', $article->slug) }}">
                            <h3 class="text-2xl font-bold mb-2 hover:text-red-600 transition">{{ $article->title }}</h3>
                        </a>
                        <p class="text-gray-600 mb-4">{{ Str::limit($article->excerpt, 150) }}</p>
                        <div class="flex items-center text-sm text-gray-500">
                            <span>{{ $article->user->name }}</span>
                            <span class="mx-2">•</span>
                            <span>{{ $article->published_at->format('M d, Y') }}</span>
                            <span class="mx-2">•</span>
                            <span>{{ $article->views_count }} views</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="mt-8">
                {{ $latestArticles->links() }}
            </div>
        </div>

        <div class="lg:col-span-1">
            @if($trendingArticles->isNotEmpty())
            <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
                <h3 class="text-2xl font-bold mb-4 border-b-4 border-red-600 inline-block pb-2">Trending Now</h3>
                <div class="space-y-4">
                    @foreach($trendingArticles as $index => $article)
                    <div class="flex items-start space-x-4">
                        <span class="text-3xl font-bold text-red-600">{{ $index + 1 }}</span>
                        <div class="flex-1">
                            <a href="{{ route('articles.show', $article->slug) }}"
                               class="font-semibold hover:text-red-600 transition">
                                {{ $article->title }}
                            </a>
                            <div class="text-sm text-gray-500 mt-1">
                                {{ $article->views_count }} views
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            <div class="bg-gradient-to-br from-red-600 to-red-800 text-white rounded-lg shadow-lg p-6">
                <h3 class="text-2xl font-bold mb-4">Subscribe to Newsletter</h3>
                <p class="mb-4">Get the latest news delivered directly to your inbox.</p>
                <form class="space-y-3">
                    <input type="email" placeholder="Your email"
                           class="w-full px-4 py-2 rounded-lg text-gray-900 focus:outline-none">
                    <button type="submit"
                            class="w-full bg-white text-red-600 font-bold py-2 rounded-lg hover:bg-gray-100 transition">
                        Subscribe
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
