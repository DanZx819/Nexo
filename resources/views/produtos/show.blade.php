@extends('layout.app')

@section('title', $produto->titulo . ' - Nexo')

@section('content')
    <!-- Full Screen Product Detail Layout -->
    <div class="min-h-screen bg-gradient-to-br from-blue-900 via-blue-800 to-blue-900 py-8 px-4">
        <div class="max-w-6xl mx-auto">

            <!-- Back Navigation -->
            <div class="mb-6">
                <a href="{{ route('dashboard') }}"
                    class="inline-flex items-center space-x-2 text-white hover:text-blue-200 transition-colors duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    <span class="font-medium">Back to Products</span>
                </a>
            </div>



            <!-- Product Card -->
            <div class="bg-white rounded-2xl shadow-2xl overflow-hidden">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-0">

                    <!-- Product Image -->
                    <div class="relative bg-gray-100">
                        <div class="aspect-w-16 aspect-h-16 lg:aspect-w-4 lg:aspect-h-3">
                            <img src="{{ asset('storage/' . $produto->foto) }}" alt="{{ $produto->titulo }}"
                                class="w-full h-full object-cover" />
                        </div>

                        <!-- Image Overlay Badge -->
                        <div class="absolute top-4 left-4">
                            <span class="bg-blue-600 text-white px-3 py-1 rounded-full text-sm font-medium">
                                New Product
                            </span>
                        </div>
                    </div>

                    <!-- Product Details -->
                    <div class="p-8 lg:p-12 flex flex-col justify-between">

                        <!-- Product Info -->
                        <div class="mb-8">
                            <!-- Product Title -->
                            <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">
                                {{ $produto->titulo }}
                            </h1>

                            <!-- Product Description -->
                            <div class="prose max-w-none mb-6">
                                <p class="text-gray-600 text-lg leading-relaxed">
                                    {{ $produto->descricao }}
                                </p>
                            </div>

                            <!-- Price -->
                            <div class="flex items-center space-x-4 mb-6">
                                <div class="text-4xl font-bold text-gray-900">
                                    ${{ number_format($produto->preco, 2) }}
                                </div>
                                @if ($produto->quantidade > 0)
                                    <div class="flex items-center text-green-600">
                                        <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span class="font-medium">Only {{ $produto->quantidade }} in Stock </span>
                                    </div>
                                @else
                                    <div class="flex items-center text-red-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M18.364 18.364A9 9 0 0 0 5.636 5.636m12.728 12.728A9 9 0 0 1 5.636 5.636m12.728 12.728L5.636 5.636" />
                                        </svg>

                                        <span class="font-medium">Off Stock {{ $produto->quantidade }}</span>
                                    </div>
                                @endif

                            </div>

                            <!-- Product Features -->
                            <div class="grid grid-cols-2 gap-4 mb-8">
                                <div class="flex items-center space-x-2 text-gray-600">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                    </svg>
                                    <span>Free Shipping</span>
                                </div>
                                <div class="flex items-center space-x-2 text-gray-600">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m5.414-4.414a2 2 0 00-2.828 0L4 16.172V20h3.828l8.586-8.586a2 2 0 000-2.828z">
                                        </path>
                                    </svg>
                                    <span>30-Day Return</span>
                                </div>
                                <div class="flex items-center space-x-2 text-gray-600">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                        </path>
                                    </svg>
                                    <span>Secure Payment</span>
                                </div>
                                <div class="flex items-center space-x-2 text-gray-600">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                        </path>
                                    </svg>
                                    <span>Quality Guarantee</span>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="space-y-6">

                            <!-- Seletor de Quantidade -->
                            <div class="flex items-center space-x-4">
                                <label class="text-sm font-medium text-gray-700">Quantity:</label>
                                <div class="flex items-center border border-gray-300 rounded-lg">
                                    <button type="button" onclick="decreaseQuantity()"
                                        class="px-3 py-2 text-gray-600 hover:text-gray-800 hover:bg-gray-50">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M20 12H4" />
                                        </svg>
                                    </button>
                                    <input type="number" id="quantity" min="1" value="1"
                                        name="product_quantity" class="w-16 px-3 py-2 text-center border-0 focus:ring-0"
                                        readonly>
                                    <button type="button" onclick="increaseQuantity()"
                                        class="px-3 py-2 text-gray-600 hover:text-gray-800 hover:bg-gray-50">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <!-- Botões principais -->
                            <div class="flex flex-col sm:flex-row gap-4">

                                <!-- Add to Cart -->
                                <form action="{{ route('cart.add') }}" method="POST" class="w-full sm:w-1/2">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $produto->id }}">
                                    <input type="hidden" name="product_quantity" id="product_quantity" value="1">
                                    <button type="submit"
                                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-4 px-6 rounded-lg flex items-center justify-center space-x-2 text-lg">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 5M7 13l2.5 5m0 0h7.5M17 18a2 2 0 11-4 0 2 2 0 014 0zM9 18a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                        <span>Add to Cart</span>
                                    </button>
                                </form>

                                <!-- Buy Now -->
                                <form action="{{ route('checkout') }}" method="POST" class="w-full sm:w-1/2">
                                    @csrf
                                    <input type="hidden" name="titulo" value="{{ $produto->titulo }}">
                                    <input type="hidden" name="quantidade" value="1">
                                    <input type="hidden" name="preco" value="{{ $produto->preco }}">
                                    <button type="submit"
                                        class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-4 px-6 rounded-lg flex items-center justify-center space-x-2 text-lg">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                        </svg>
                                        <span>Buy Now</span>
                                    </button>
                                </form>
                            </div>

                            <!-- Ações secundárias -->
                            <div class="flex justify-center space-x-8 pt-4">
                                <!-- Wishlist -->
                                <button
                                    class="flex items-center space-x-2 text-gray-600 hover:text-red-600 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                    </svg>
                                    <span>Add to Wishlist</span>
                                </button>

                                <!-- Share -->
                                <button
                                    class="flex items-center space-x-2 text-gray-600 hover:text-blue-600 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z" />
                                    </svg>
                                    <span>Share Product</span>
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Additional Product Information -->
            <div class="mt-8 bg-white rounded-2xl shadow-2xl p-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                    <!-- Product Specifications -->
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4 flex items-center">
                            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v6a2 2 0 002 2h2m0-8h2a2 2 0 012 2v6a2 2 0 01-2 2H9m0-8v8"></path>
                            </svg>
                            Specifications
                        </h3>
                        <div class="space-y-2 text-gray-600">
                            <div class="flex justify-between">
                                <span>Category:</span>
                                <span class="font-medium">Electronics</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Brand:</span>
                                <span class="font-medium">NEXO</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Weight:</span>
                                <span class="font-medium">1.2 kg</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Warranty:</span>
                                <span class="font-medium">2 Years</span>
                            </div>
                        </div>
                    </div>

                    <!-- Shipping Info -->
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4 flex items-center">
                            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                            Shipping
                        </h3>
                        <div class="space-y-2 text-gray-600">
                            <div class="flex items-center space-x-2">
                                <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Free standard shipping</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Express delivery available</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Ships within 1-2 business days</span>
                            </div>
                        </div>
                    </div>

                    <!-- Customer Support -->
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4 flex items-center">
                            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z">
                                </path>
                            </svg>
                            Support
                        </h3>
                        <div class="space-y-2 text-gray-600">
                            <div class="flex items-center space-x-2">
                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                    </path>
                                </svg>
                                <span>24/7 chat support</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                    </path>
                                </svg>
                                <span>Phone support</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207">
                                    </path>
                                </svg>
                                <span>Email support</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="text-center mt-8">
                <p class="text-white text-sm opacity-75">
                    © 2025 NEXO. All rights reserved.
                </p>
            </div>
        </div>
    </div>

    <!-- JavaScript for Quantity Control -->
    <script>
        function increaseQuantity() {
            const quantityInput = document.getElementById('quantity');
            const cartQuantityInput = document.getElementById('cart-quantity');
            const currentValue = parseInt(quantityInput.value);
            const newValue = currentValue + 1;

            quantityInput.value = newValue;
            cartQuantityInput.value = newValue;
        }

        function decreaseQuantity() {
            const quantityInput = document.getElementById('quantity');
            const cartQuantityInput = document.getElementById('cart-quantity');
            const currentValue = parseInt(quantityInput.value);

            if (currentValue > 1) {
                const newValue = currentValue - 1;
                quantityInput.value = newValue;
                cartQuantityInput.value = newValue;
            }
        }

        // Add loading state to cart button
        document.querySelector('form[action*="cart.add"] button').addEventListener('click', function() {
            this.disabled = true;
            this.innerHTML =
                '<svg class="animate-spin -ml-1 mr-3 h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>Adding to Cart...';
        });
    </script>
@endsection
