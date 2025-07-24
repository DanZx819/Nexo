@extends('layout.app')

@section('title', 'Shopping Cart - Nexo')

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
    <!-- Full Screen Cart Layout -->
    <div class="min-h-screen bg-gradient-to-br from-blue-900 via-blue-800 to-blue-900 py-8 px-4">
        <div class="max-w-4xl mx-auto">
            
            <!-- Cart Header -->
            <div class="bg-white rounded-2xl shadow-2xl mb-6">
                <div class="p-8 border-b border-gray-200">
                    <div class="flex items-center space-x-4">
                        <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-7 text-blue-600" >
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-3xl font-bold text-gray-900">Your Shopping Cart</h1>
                            <p class="text-gray-600">Review your items before checkout</p>
                        </div>
                    </div>
                </div>

                @if ($itens->isEmpty())
                    <!-- Empty Cart State -->
                    <div class="p-8 text-center">
                        <div class="bg-gray-100 w-24 h-24 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l-1 12H6L5 9z"></path>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-semibold text-gray-900 mb-4">Your cart is empty</h2>
                        <p class="text-gray-600 mb-8">Looks like you haven't added any items to your cart yet.</p>
                        <a href="{{ route('dashboard') }}" class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition-all duration-200">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"></path>
                            </svg>
                            Continue Shopping
                        </a>
                    </div>
                @else
                    <!-- Cart Items -->
                    <div class="p-8">
                        <div class="space-y-6">
                            @foreach ($itens as $item)
                                <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-lg border border-gray-200 hover:shadow-md transition-all duration-200">
                                    <!-- Product Image -->
                                    <div class="flex-shrink-0">
                                        <img 
                                            src="{{ asset($item->attributes->foto) }}" 
                                            alt="{{ $item->name }}"
                                            class="w-20 h-20 object-cover rounded-lg border border-gray-200"
                                        >
                                    </div>
                                    
                                    <!-- Product Details -->
                                    <div class="flex-grow">
                                        <h3 class="text-lg font-semibold text-gray-900 mb-1">{{ $item->name }}</h3>
                                        <div class="flex items-center space-x-4 text-sm text-gray-600">
                                            <span class="flex items-center">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                                </svg>
                                                ${{ number_format($item->price, 2) }}
                                            </span>
                                            <span class="flex items-center">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path>
                                                </svg>
                                                Qty: {{ $item->quantity }}
                                            </span>
                                        </div>
                                    </div>
                                    
                                    <!-- Item Total & Remove Button -->
                                    <div class="flex items-center space-x-4">
                                        <div class="text-right">
                                            <p class="text-lg font-bold text-gray-900">
                                                ${{ number_format($item->price * $item->quantity, 2) }}
                                            </p>
                                            <p class="text-sm text-gray-500">Total</p>
                                        </div>
                                        
                                        <form action="{{ route('cart.remover', $item->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button 
                                                type="submit" 
                                                class="p-2 text-red-600 hover:text-red-800 hover:bg-red-50 rounded-lg transition-all duration-200"
                                                onclick="return confirm('Are you sure you want to remove this item?')"
                                                title="Remove item"
                                            >
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Cart Summary -->
                    <div class="bg-gray-50 px-8 py-6 border-t border-gray-200">
                        <div class="flex items-center justify-between mb-6">
                            <div class="flex items-center space-x-2">
                                <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                </svg>
                                <span class="text-2xl font-bold text-gray-900">Total: ${{ Cart::getTotal() }}</span>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                            <!-- Clear Cart Button -->
                            <form action="{{ route('cart.limpar') }}" method="POST" class="flex-1">
                                @csrf
                                @method('DELETE')
                                <button 
                                    type="submit" 
                                    class="w-full bg-red-600 hover:bg-red-700 text-white font-semibold py-3 px-6 rounded-lg transition-all duration-200 flex items-center justify-center space-x-2"
                                    onclick="return confirm('Are you sure you want to clear your entire cart?')"
                                >
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                    <span>Clear Cart</span>
                                </button>
                            </form>

                            <!-- Continue Shopping Button -->
                            <a 
                                href="{{ route('dashboard') }}" 
                                class="flex-1 bg-gray-600 hover:bg-gray-700 text-white font-semibold py-3 px-6 rounded-lg transition-all duration-200 flex items-center justify-center space-x-2"
                            >
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"></path>
                                </svg>
                                <span>Continue Shopping</span>
                            </a>

                            <!-- Checkout Button -->
                            <a 
                                href="#" 
                                class="flex-1 bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded-lg transition-all duration-200 flex items-center justify-center space-x-2"
                            >
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                                </svg>
                                <span>Proceed to Checkout</span>
                            </a>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Footer -->
            <div class="text-center">
                <p class="text-white text-sm opacity-75">
                    © 2025 NEXO. All rights reserved.
                </p>
            </div>
        </div>
    </div>
@endsection