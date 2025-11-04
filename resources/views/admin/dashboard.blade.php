<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Admin Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="text-gray-600">Total Articles</div>
                    <div class="text-3xl font-bold">{{ $stats['total_articles'] }}</div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="text-gray-600">Published</div>
                    <div class="text-3xl font-bold text-green-600">{{ $stats['published_articles'] }}</div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="text-gray-600">Drafts</div>
                    <div class="text-3xl font-bold text-yellow-600">{{ $stats['draft_articles'] }}</div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 mb-8">
                <h3 class="text-xl font-bold mb-4">Quick Actions</h3>
                <div class="flex space-x-4">
                    <a href="{{ route('admin.articles.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        Create Article
                    </a>
                    <a href="{{ route('admin.articles.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">
                        Manage Articles
                    </a>
                    <a href="{{ route('admin.categories.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">
                        Manage Categories
                    </a>
                    <a href="{{ route('admin.tags.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">
                        Manage Tags
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-xl font-bold mb-4">Recent Articles</h3>
                    <div class="space-y-3">
                        @foreach($recentArticles as $article)
                        <div class="border-b pb-3">
                            <a href="{{ route('articles.show', $article->slug) }}" class="font-semibold hover:text-blue-600">
                                {{ $article->title }}
                            </a>
                            <div class="text-sm text-gray-600">
                                {{ $article->status }} • {{ $article->created_at->diffForHumans() }}
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-xl font-bold mb-4">Popular Articles</h3>
                    <div class="space-y-3">
                        @foreach($popularArticles as $article)
                        <div class="border-b pb-3">
                            <a href="{{ route('articles.show', $article->slug) }}" class="font-semibold hover:text-blue-600">
                                {{ $article->title }}
                            </a>
                            <div class="text-sm text-gray-600">
                                {{ $article->views_count }} views
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
