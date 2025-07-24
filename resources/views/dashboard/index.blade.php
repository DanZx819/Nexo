@extends('layout.app')

@section('title', 'Premium E-Commerce')

@section('content')
   @if ($message = session('message'))
    <div id="success-message"
        class="fixed top-4 left-4 z-50 transform scale-0 opacity-0 transition-all duration-300 ease-out">
        <div class="bg-green-500 text-white px-6 py-4 rounded-lg shadow-lg max-w-sm flex items-center space-x-3">
            <svg class="w-6 h-6 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span class="font-medium">{{ $message }}</span>
            <button onclick="hideMessage()" class="ml-auto text-white hover:text-gray-200 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>
    </div>

    <script>
        // Show message with explosion animation
        document.addEventListener('DOMContentLoaded', function() {
            const message = document.getElementById('success-message');
            if (message) {
                // Explosion effect - scale from 0 to 1.1 then back to 1
                setTimeout(() => {
                    message.classList.remove('scale-0', 'opacity-0');
                    message.classList.add('scale-110', 'opacity-100');
                    
                    // Scale back to normal size
                    setTimeout(() => {
                        message.classList.remove('scale-110');
                        message.classList.add('scale-100');
                    }, 150);
                }, 100);

                // Auto hide after 4 seconds
                setTimeout(() => {
                    hideMessage();
                }, 4000);
            }
        });

        function hideMessage() {
            const message = document.getElementById('success-message');
            if (message) {
                // Scale down and fade out
                message.classList.remove('scale-100', 'opacity-100');
                message.classList.add('scale-0', 'opacity-0');

                // Remove from DOM after animation
                setTimeout(() => {
                    message.remove();
                }, 300);
            }
        }
    </script>
@endif

    <!-- Header Section -->
    <div class="bg-gradient-to-r from-blue-900 via-blue-800 to-blue-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Navigation Bar -->
            <nav class="flex items-center justify-between py-4">
                <div class="flex items-center space-x-8">
                    <!-- Logo -->
                    <div class="text-2xl font-bold">
                        <span class="text-white">NEXO</span>
                    </div>

                    <!-- Navigation Links -->
                    <div class="hidden md:flex space-x-6">
                        <a href="#" class="text-white hover:text-blue-200 transition-colors">Home</a>
                        <a href="#" class="text-white hover:text-blue-200 transition-colors">Products</a>
                        <a href="#" class="text-white hover:text-blue-200 transition-colors">Categories</a>
                        <a href="#" class="text-white hover:text-blue-200 transition-colors">About</a>
                        <a href="#" class="text-white hover:text-blue-200 transition-colors">Contact</a>
                        <a href="{{ route('cart.index') }}"
                            class="text-white hover:text-blue-200 transition-colors">Cart</a>
                    </div>
                </div>

                <!-- User Actions -->
                <div class="flex items-center space-x-4">
                    <div class="text-sm">
                        Welcome, <span class="font-semibold">{{ auth()->user()->name }}</span>
                    </div>

                    @if (auth()->user()->is_admin)
                        <a href="{{ route('admin.menu') }}"
                            class="bg-yellow-600 hover:bg-yellow-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                            Admin Panel
                        </a>
                    @endif

                    <form action="{{ route('logout') }}" method="post" class="inline">
                        @csrf
                        <button type="submit"
                            class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                            Logout
                        </button>
                    </form>
                </div>
            </nav>

            <!-- Hero Section -->
            <div class="py-16 text-center">
                <h1 class="text-5xl font-bold mb-4">
                    Discover Premium Products at <span class="text-blue-300">NEXO</span>
                </h1>
                <p class="text-xl text-blue-100 mb-8 max-w-3xl mx-auto">
                    Your gateway to exceptional quality and unbeatable prices. Shop the latest trends and timeless classics.
                </p>

                <!-- Search Form -->
                <div class="max-w-2xl mx-auto">
                    <form action="{{ route('dashboard') }}" method="GET" class="relative">
                        <div class="flex">
                            <input type="text" name="pesquisa" placeholder="Search for products, brands, categories..."
                                class="flex-1 px-6 py-4 text-gray-900 bg-white rounded-l-lg border-0 focus:ring-4 focus:ring-blue-300 focus:outline-none text-lg">
                            <button type="submit"
                                class="px-8 py-4 bg-black hover:bg-gray-800 text-white rounded-r-lg font-medium transition-colors flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                                Search
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if (count($produtos) == 0 && $pesquisa)
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-8 max-w-4xl mx-auto">
            <div class="text-center">
                <div class="bg-red-50 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">No Products Found</h3>
                <p class="text-gray-600 mb-4">
                    No products found for: <span class="font-semibold text-blue-600">"{{ $pesquisa }}"</span>
                </p>
                <a href="{{ route('dashboard') }}"
                    class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-medium transition-colors">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                        </path>
                    </svg>
                    View All Products
                </a>
            </div>
        </div>
    @elseif ($pesquisa)
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-8 max-w-4xl mx-auto">
            <div class="flex items-center justify-between flex-wrap gap-4">
                <div class="flex items-center space-x-3">
                    <div class="bg-blue-100 p-2 rounded-full">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">Search Results</h3>
                        <p class="text-gray-600">
                            <span class="font-medium text-blue-600">{{ count($produtos) }}</span>
                            {{ count($produtos) == 1 ? 'product' : 'products' }} found for
                            <span class="font-semibold">"{{ $pesquisa }}"</span>
                        </p>
                    </div>
                </div>
                <a href="{{ route('dashboard') }}"
                    class="inline-flex items-center bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-lg font-medium transition-colors">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    All Products
                </a>
            </div>
        </div>
    @endif
    <!-- Products Section -->
    <div class="bg-gray-50 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Featured Products</h2>
                <p class="text-xl text-gray-600">Discover our handpicked selection of premium items</p>
            </div>

            <!-- Filters -->
            <div class="mb-8 flex flex-wrap gap-4 justify-center">
                <button
                    class="px-6 py-2 bg-blue-600 text-white rounded-full font-medium hover:bg-blue-700 transition-colors">All
                    Products</button>
                <button
                    class="px-6 py-2 bg-white text-gray-700 border border-gray-300 rounded-full font-medium hover:bg-gray-50 transition-colors">Best
                    Sellers</button>
                <button
                    class="px-6 py-2 bg-white text-gray-700 border border-gray-300 rounded-full font-medium hover:bg-gray-50 transition-colors">New
                    Arrivals</button>
                <button
                    class="px-6 py-2 bg-white text-gray-700 border border-gray-300 rounded-full font-medium hover:bg-gray-50 transition-colors">On
                    Sale</button>
            </div>

            <!-- Products Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @foreach ($produtos as $produto)
                    <div
                        class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 group">
                        <!-- Product Image -->
                        <div class="relative overflow-hidden rounded-t-2xl">
                            <img src="{{ $produto->foto }}" alt="{{ $produto->titulo }}"
                                class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500" />
                            <div class="absolute top-4 right-4">
                                <button
                                    class="bg-white bg-opacity-90 hover:bg-opacity-100 p-2 rounded-full shadow-lg transition-all">
                                    <svg class="w-5 h-5 text-gray-600 hover:text-red-500" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- Product Info -->
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-gray-900 mb-2 line-clamp-2">
                                {{ $produto->titulo }}
                            </h3>
                            <p class="text-gray-600 mb-4 line-clamp-3">
                                {{ $produto->descricao }}
                            </p>

                            <!-- Price and Rating -->
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center">
                                    <span
                                        class="text-2xl font-bold text-blue-600">${{ number_format($produto->preco, 2) }}</span>
                                </div>
                                <div class="flex items-center space-x-1">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <svg class="w-4 h-4 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                            <path
                                                d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                        </svg>
                                    @endfor
                                    <span class="text-sm text-gray-500 ml-1">(4.8)</span>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="space-y-2">
                                <form action="{{ route('cart.add') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $produto->id }}">
                                    <input type="hidden" name="product_quantity" value="1">
                                    <button type="submit"
                                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors flex items-center justify-center space-x-2">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                        </svg>
                                        <span>Add to Cart</span>
                                    </button>
                                </form>
                                <a class="w-full bg-gray-100 hover:bg-gray-200 text-gray-800 font-semibold py-2 px-6 rounded-lg transition-colors"
                                    href=" {{ route('produtos.show', $produto) }}">
                                    Quick View
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Load More Button -->
            <div class="text-center mt-12">
                <button class="bg-black hover:bg-gray-800 text-white font-semibold py-3 px-8 rounded-lg transition-colors">
                    Load More Products
                </button>
            </div>
        </div>
    </div>

    <!-- Newsletter Section -->
    <div class="bg-blue-900 text-white py-16">
        <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold mb-4">Stay Updated with NEXO</h2>
            <p class="text-xl text-blue-100 mb-8">Subscribe to our newsletter and be the first to know about new products,
                exclusive deals, and special offers.</p>

            <form class="flex flex-col sm:flex-row gap-4 max-w-lg mx-auto">
                <input type="email" placeholder="Enter your email address"
                    class="flex-1 px-6 py-3 text-gray-900 rounded-lg border-0 focus:ring-4 focus:ring-blue-300 focus:outline-none">
                <button type="submit"
                    class="bg-black hover:bg-gray-800 text-white font-semibold py-3 px-8 rounded-lg transition-colors whitespace-nowrap">
                    Subscribe Now
                </button>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-2xl font-bold mb-4">NEXO</h3>
                    <p class="text-gray-400">Your premium e-commerce destination for quality products and exceptional
                        service.</p>
                </div>
                <div>
                    <h4 class="font-semibold mb-4">Quick Links</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white transition-colors">About Us</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Contact</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">FAQ</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Shipping</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold mb-4">Customer Service</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white transition-colors">Support Center</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Returns</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Track Order</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Size Guide</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold mb-4">Follow Us</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z" />
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.120.112.225.085.347-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.746-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24.009c6.624 0 11.99-5.367 11.99-11.988C24.007 5.367 18.641.001.017 0z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2025 NEXO. All rights reserved. | Privacy Policy | Terms of Service</p>
            </div>
        </div>
    </footer>
@endsection
