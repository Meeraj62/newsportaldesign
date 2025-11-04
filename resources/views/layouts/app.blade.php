<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="{{ request()->cookie('theme', 'light') }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', config('app.name', 'NewsPortal')) - Nepal News Portal</title>
    
    <meta name="description" content="@yield('meta_description', 'Latest news from Nepal and around the world. Breaking news, politics, business, technology, sports, and entertainment.')">
    <meta name="keywords" content="@yield('meta_keywords', 'Nepal news, breaking news, politics, business, technology, sports, entertainment')">
    <meta name="author" content="@yield('meta_author', config('app.name'))">
    
    <meta property="og:title" content="@yield('og_title', config('app.name'))">
    <meta property="og:description" content="@yield('og_description', 'Latest news from Nepal')">
    <meta property="og:image" content="@yield('og_image', asset('images/logo.png'))">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="@yield('og_type', 'website')">
    
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('twitter_title', config('app.name'))">
    <meta name="twitter:description" content="@yield('twitter_description', 'Latest news from Nepal')">
    <meta name="twitter:image" content="@yield('twitter_image', asset('images/logo.png'))">
    
    <link rel="canonical" href="{{ url()->current() }}">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-nepal-gray-50 dark:bg-nepal-gray-900 transition-colors duration-200">
    <nav class="bg-white dark:bg-nepal-gray-800 shadow-lg sticky top-0 z-50 transition-colors duration-200">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center space-x-8">
                    <a href="{{ route('home') }}" class="text-3xl font-bold text-nepal-red-700 dark:text-nepal-red-400 hover:text-nepal-red-800 dark:hover:text-nepal-red-300 transition">
                        NewsPortal <span class="text-lg">नेपाल</span>
                    </a>
                    <div class="hidden md:flex space-x-6">
                        @foreach($categories ?? [] as $cat)
                            <a href="{{ route('categories.show', $cat->slug) }}"
                               class="text-nepal-gray-700 dark:text-nepal-gray-200 hover:text-nepal-red-600 dark:hover:text-nepal-red-400 font-medium transition">
                                {{ $cat->name }}
                            </a>
                        @endforeach
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <form action="{{ route('articles.search') }}" method="GET" class="hidden md:block">
                        <div class="relative">
                            <input type="text" name="q" placeholder="Search news... / खोज्नुहोस्"
                                   value="{{ request('q') }}"
                                   class="px-4 py-2 pr-10 border border-nepal-gray-300 dark:border-nepal-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-nepal-red-500 dark:bg-nepal-gray-700 dark:text-white transition">
                            <button type="submit" class="absolute right-2 top-2 text-nepal-gray-500 dark:text-nepal-gray-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </button>
                        </div>
                    </form>
                    @auth
                        @if(in_array(auth()->user()->role, ['admin', 'editor', 'author']))
                            <a href="{{ route('admin.dashboard') }}"
                               class="bg-nepal-red-700 text-white px-4 py-2 rounded-lg hover:bg-nepal-red-800 transition">
                                Admin
                            </a>
                        @endif
                        <a href="{{ route('profile.edit') }}"
                           class="text-nepal-gray-700 dark:text-nepal-gray-200 hover:text-nepal-red-600 dark:hover:text-nepal-red-400 font-medium transition">
                            Profile
                        </a>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit"
                                    class="text-nepal-gray-700 dark:text-nepal-gray-200 hover:text-nepal-red-600 dark:hover:text-nepal-red-400 font-medium transition">
                                Logout
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}"
                           class="text-nepal-gray-700 dark:text-nepal-gray-200 hover:text-nepal-red-600 dark:hover:text-nepal-red-400 font-medium transition">
                            Login
                        </a>
                        <a href="{{ route('register') }}"
                           class="bg-nepal-red-700 text-white px-4 py-2 rounded-lg hover:bg-nepal-red-800 transition">
                            Register
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    @yield('content')

    <footer class="bg-nepal-gray-900 text-white mt-16">
        <div class="container mx-auto px-4 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4 text-nepal-red-400">NewsPortal नेपाल</h3>
                    <p class="text-nepal-gray-400">Your trusted source for latest news and updates from Nepal and around the world.</p>
                    <p class="text-nepal-gray-400 mt-2">तपाईंको विश्वसनीय समाचार स्रोत</p>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4 text-nepal-red-400">Categories</h4>
                    <ul class="space-y-2">
                        @foreach(($categories ?? [])->take(6) as $cat)
                            <li>
                                <a href="{{ route('categories.show', $cat->slug) }}"
                                   class="text-nepal-gray-400 hover:text-white transition">
                                    {{ $cat->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4 text-nepal-red-400">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('home') }}" class="text-nepal-gray-400 hover:text-white transition">Home / होम</a></li>
                        <li><a href="#" class="text-nepal-gray-400 hover:text-white transition">About Us / हाम्रो बारेमा</a></li>
                        <li><a href="#" class="text-nepal-gray-400 hover:text-white transition">Contact / सम्पर्क</a></li>
                        <li><a href="#" class="text-nepal-gray-400 hover:text-white transition">Privacy Policy</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4 text-nepal-red-400">Follow Us</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="text-nepal-gray-400 hover:text-white transition">Facebook</a>
                        <a href="#" class="text-nepal-gray-400 hover:text-white transition">Twitter</a>
                        <a href="#" class="text-nepal-gray-400 hover:text-white transition">Instagram</a>
                    </div>
                </div>
            </div>
            <div class="border-t border-nepal-gray-800 mt-8 pt-8 text-center text-nepal-gray-400">
                <p>&copy; {{ date('Y') }} NewsPortal. All rights reserved. | Made with ❤️ in Nepal</p>
            </div>
        </div>
    </footer>
</body>
</html>
