<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'News Portal') }} - @yield('title', 'Latest News')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-50">
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center space-x-8">
                    <a href="{{ route('home') }}" class="text-3xl font-bold text-red-600">
                        NewsPortal
                    </a>
                    <div class="hidden md:flex space-x-6">
                        @foreach($categories ?? [] as $cat)
                            <a href="{{ route('categories.show', $cat->slug) }}"
                               class="text-gray-700 hover:text-red-600 font-medium transition">
                                {{ $cat->name }}
                            </a>
                        @endforeach
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <form action="{{ route('articles.search') }}" method="GET" class="hidden md:block">
                        <input type="text" name="q" placeholder="Search news..."
                               class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500">
                    </form>
                    @auth
                        @if(in_array(auth()->user()->role, ['admin', 'editor', 'author']))
                            <a href="{{ route('admin.dashboard') }}"
                               class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition">
                                Admin
                            </a>
                        @endif
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit"
                                    class="text-gray-700 hover:text-red-600 font-medium transition">
                                Logout
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}"
                           class="text-gray-700 hover:text-red-600 font-medium transition">
                            Login
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    @yield('content')

    <footer class="bg-gray-900 text-white mt-16">
        <div class="container mx-auto px-4 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">NewsPortal</h3>
                    <p class="text-gray-400">Your trusted source for latest news and updates from Nepal and around the world.</p>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Categories</h4>
                    <ul class="space-y-2">
                        @foreach(($categories ?? [])->take(6) as $cat)
                            <li>
                                <a href="{{ route('categories.show', $cat->slug) }}"
                                   class="text-gray-400 hover:text-white transition">
                                    {{ $cat->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('home') }}" class="text-gray-400 hover:text-white transition">Home</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">About Us</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Contact</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Privacy Policy</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Follow Us</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition">Facebook</a>
                        <a href="#" class="text-gray-400 hover:text-white transition">Twitter</a>
                        <a href="#" class="text-gray-400 hover:text-white transition">Instagram</a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; {{ date('Y') }} NewsPortal. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
