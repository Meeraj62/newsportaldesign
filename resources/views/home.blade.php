@extends('layouts.app')

@section('title', 'Home - Latest News')

@section('content')
<div class="bg-nepal-gray-50 dark:bg-nepal-gray-900">
    <div class="bg-nepal-red-700 text-white py-2 overflow-hidden">
        <div class="container mx-auto px-4">
            <div class="flex items-center">
                <span class="bg-white text-nepal-red-700 px-3 py-1 rounded font-bold text-sm mr-4 whitespace-nowrap">
                    BREAKING
                </span>
                <div class="ticker-wrapper overflow-hidden">
                    <div class="ticker-content flex gap-8">
                        @foreach(App\Models\Article::published()->breaking()->latest('published_at')->take(5)->get() as $breaking)
                            <a href="{{ route('articles.show', $breaking->slug) }}" class="hover:underline whitespace-nowrap">
                                {{ $breaking->title }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto px-4 py-8">
        @if($featuredArticles->isNotEmpty())
        <div class="mb-12">
            <h2 class="text-3xl font-bold mb-6 text-nepal-red-700 dark:text-nepal-red-400 border-b-4 border-nepal-red-700 inline-block pb-2">
                प्रमुख समाचार / Featured Stories
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
                @foreach($featuredArticles as $article)
                <div class="bg-white dark:bg-nepal-gray-800 rounded-lg shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                    @if($article->featured_image)
                    <img src="{{ Storage::url($article->featured_image) }}" alt="{{ $article->title }}"
                         class="w-full h-48 object-cover">
                    @else
                    <div class="w-full h-48 bg-gradient-to-r from-nepal-red-500 to-nepal-red-700"></div>
                    @endif
                    <div class="p-6">
                        <a href="{{ route('categories.show', $article->category->slug) }}"
                           class="inline-block px-3 py-1 text-xs font-semibold rounded-full mb-2 text-white"
                           style="background-color: {{ $article->category->color }};">
                            {{ $article->category->name }}
                        </a>
                        <a href="{{ route('articles.show', $article->slug) }}">
                            <h3 class="text-xl font-bold mb-2 hover:text-nepal-red-600 dark:text-white dark:hover:text-nepal-red-400 transition">
                                {{ $article->title }}
                            </h3>
                        </a>
                        <p class="text-nepal-gray-600 dark:text-nepal-gray-300 mb-4">{{ Str::limit($article->excerpt, 100) }}</p>
                        <div class="flex items-center justify-between text-sm text-nepal-gray-500 dark:text-nepal-gray-400">
                            <div class="flex items-center">
                                <span>{{ $article->user->name }}</span>
                                <span class="mx-2">•</span>
                                <span>{{ $article->published_at->format('M d, Y') }}</span>
                            </div>
                            @auth
                            <button onclick="toggleBookmark({{ $article->id }})" class="text-nepal-red-600 hover:text-nepal-red-700">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
                                </svg>
                            </button>
                            @endauth
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-3xl font-bold text-nepal-red-700 dark:text-nepal-red-400 border-b-4 border-nepal-red-700 inline-block pb-2">
                        ताजा समाचार / Latest News
                    </h2>
                    <div class="flex items-center gap-2">
                        <select id="category-filter" class="border border-nepal-gray-300 rounded-lg px-4 py-2 dark:bg-nepal-gray-800 dark:text-white" onchange="filterByCategory(this.value)">
                            <option value="">All Categories</option>
                            @foreach($categories as $cat)
                            <option value="{{ $cat->slug }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="space-y-6">
                    @foreach($latestArticles as $article)
                    <article class="bg-white dark:bg-nepal-gray-800 rounded-lg shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 flex">
                        @if($article->featured_image)
                        <img src="{{ Storage::url($article->featured_image) }}" alt="{{ $article->title }}"
                             class="w-48 h-48 object-cover">
                        @else
                        <div class="w-48 h-48 bg-gradient-to-r from-nepal-gray-400 to-nepal-gray-600"></div>
                        @endif
                        <div class="p-6 flex-1">
                            <a href="{{ route('categories.show', $article->category->slug) }}"
                               class="inline-block px-3 py-1 text-xs font-semibold rounded-full mb-2 text-white"
                               style="background-color: {{ $article->category->color }};">
                                {{ $article->category->name }}
                            </a>
                            <a href="{{ route('articles.show', $article->slug) }}">
                                <h3 class="text-2xl font-bold mb-2 hover:text-nepal-red-600 dark:text-white dark:hover:text-nepal-red-400 transition">
                                    {{ $article->title }}
                                </h3>
                            </a>
                            <p class="text-nepal-gray-600 dark:text-nepal-gray-300 mb-4">{{ Str::limit($article->excerpt, 150) }}</p>
                            <div class="flex items-center justify-between text-sm text-nepal-gray-500 dark:text-nepal-gray-400">
                                <div class="flex items-center">
                                    <span>{{ $article->user->name }}</span>
                                    <span class="mx-2">•</span>
                                    <span>{{ $article->published_at->format('M d, Y') }}</span>
                                    <span class="mx-2">•</span>
                                    <span>{{ $article->views_count }} views</span>
                                </div>
                                @auth
                                <button onclick="toggleBookmark({{ $article->id }})" class="text-nepal-red-600 hover:text-nepal-red-700">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
                                    </svg>
                                </button>
                                @endauth
                            </div>
                        </div>
                    </article>
                    @endforeach
                </div>
                <div class="mt-8">
                    {{ $latestArticles->links() }}
                </div>
            </div>

            <div class="lg:col-span-1 space-y-6">
                <div class="bg-white dark:bg-nepal-gray-800 rounded-lg shadow-lg p-6">
                    <h3 class="text-2xl font-bold mb-4 text-nepal-red-700 dark:text-nepal-red-400 border-b-4 border-nepal-red-700 inline-block pb-2">
                        ट्रेन्डिङ / Trending
                    </h3>
                    <div class="space-y-4 mt-6">
                        @foreach($trendingArticles as $index => $article)
                        <div class="flex items-start space-x-4 pb-4 border-b border-nepal-gray-200 dark:border-nepal-gray-700">
                            <span class="text-3xl font-bold text-nepal-red-600">{{ $index + 1 }}</span>
                            <div class="flex-1">
                                <a href="{{ route('articles.show', $article->slug) }}"
                                   class="font-semibold hover:text-nepal-red-600 dark:text-white dark:hover:text-nepal-red-400 transition">
                                    {{ $article->title }}
                                </a>
                                <div class="text-sm text-nepal-gray-500 dark:text-nepal-gray-400 mt-1">
                                    {{ $article->views_count }} views • {{ $article->published_at->diffForHumans() }}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="bg-gradient-to-br from-nepal-red-700 to-nepal-red-900 text-white rounded-lg shadow-lg p-6">
                    <h3 class="text-2xl font-bold mb-4">न्यूजलेटर / Newsletter</h3>
                    <p class="mb-4">Get the latest news delivered directly to your inbox.</p>
                    <form id="newsletter-form" class="space-y-3">
                        @csrf
                        <input type="email" name="email" placeholder="Your email" required
                               class="w-full px-4 py-2 rounded-lg text-gray-900 focus:outline-none focus:ring-2 focus:ring-nepal-red-500">
                        <button type="submit"
                                class="w-full bg-white text-nepal-red-700 font-bold py-2 rounded-lg hover:bg-nepal-gray-100 transition">
                            Subscribe
                        </button>
                    </form>
                    <div id="newsletter-message" class="mt-2 text-sm"></div>
                </div>

                <button id="dark-mode-toggle" class="w-full bg-nepal-gray-800 dark:bg-white text-white dark:text-nepal-gray-900 rounded-lg shadow-lg p-4 font-bold hover:bg-nepal-gray-900 dark:hover:bg-nepal-gray-100 transition">
                    <span class="dark:hidden">🌙 Dark Mode</span>
                    <span class="hidden dark:inline">☀️ Light Mode</span>
                </button>
            </div>
        </div>
    </div>
</div>

<style>
@keyframes ticker {
    0% { transform: translateX(0); }
    100% { transform: translateX(-50%); }
}
.ticker-content {
    animation: ticker 30s linear infinite;
    width: max-content;
}
.ticker-content:hover {
    animation-play-state: paused;
}
</style>

<script>
const darkModeToggle = document.getElementById('dark-mode-toggle');
const html = document.documentElement;

if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    html.classList.add('dark');
} else {
    html.classList.remove('dark');
}

darkModeToggle.addEventListener('click', () => {
    html.classList.toggle('dark');
    localStorage.theme = html.classList.contains('dark') ? 'dark' : 'light';
});

document.getElementById('newsletter-form').addEventListener('submit', async (e) => {
    e.preventDefault();
    const form = e.target;
    const email = form.email.value;
    const messageDiv = document.getElementById('newsletter-message');
    
    try {
        const response = await fetch('/newsletter/subscribe', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({ email })
        });
        
        const data = await response.json();
        messageDiv.textContent = data.message;
        messageDiv.className = response.ok ? 'mt-2 text-sm text-green-300' : 'mt-2 text-sm text-red-300';
        
        if (response.ok) form.reset();
    } catch (error) {
        messageDiv.textContent = 'An error occurred. Please try again.';
        messageDiv.className = 'mt-2 text-sm text-red-300';
    }
});

function filterByCategory(slug) {
    if (slug) {
        window.location.href = `/categories/${slug}`;
    }
}

function toggleBookmark(articleId) {
    fetch(`/bookmarks/toggle/${articleId}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        }
    }).then(response => response.json())
      .then(data => alert(data.message));
}
</script>
@endsection
