@extends('layout.app')

@section('title', 'Edit Product - Nexo Admin')

@section('content')
    <!-- Header Section -->
    <div class="bg-gradient-to-r from-blue-900 via-blue-800 to-blue-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl font-bold mb-4">Edit Product</h1>
                <p class="text-xl text-blue-100">Update product information and inventory</p>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="bg-gray-50 min-h-screen py-12">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-0">
                    
                    <!-- Product Image Section -->
                    <div class="bg-gray-100 p-8 lg:p-12 flex items-center justify-center">
                        <div class="text-center">
                            <div class="bg-white rounded-2xl p-6 shadow-lg">
                                <img 
                                    src="{{ asset('storage/' . $produto->foto) }}" 
                                    alt="{{ $produto->titulo }}" 
                                    class="w-full max-w-sm h-auto rounded-xl object-cover mx-auto"
                                    id="product-preview"
                                >
                            </div>
                            <p class="text-gray-600 mt-4 text-sm">Current Product Image</p>
                        </div>
                    </div>

                    <!-- Form Section -->
                    <div class="p-8 lg:p-12">
                        <form action="{{ route('update.product') }}" method="post" enctype="multipart/form-data" class="space-y-6">
                            @csrf
                            <input type="hidden" name="id" value="{{ $produto->id }}">

                            <!-- Form Header -->
                            <div class="border-b border-gray-200 pb-6">
                                <h2 class="text-2xl font-bold text-gray-900 mb-2">Product Information</h2>
                                <p class="text-gray-600">Update the details for this product</p>
                            </div>

                            <!-- Product Title -->
                            <div>
                                <label for="titulo" class="block text-sm font-medium text-gray-700 mb-2">
                                    <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                    </svg>
                                    Product Title
                                </label>
                                <input 
                                    type="text" 
                                    name="titulo" 
                                    id="titulo"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-4 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                    placeholder="Enter product title"
                                    value="{{ $produto->titulo }}"
                                    required
                                >
                            </div>

                            <!-- Product Description -->
                            <div>
                                <label for="descricao" class="block text-sm font-medium text-gray-700 mb-2">
                                    <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path>
                                    </svg>
                                    Description
                                </label>
                                <textarea 
                                    name="descricao" 
                                    id="descricao"
                                    rows="3"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-4 focus:ring-blue-500 focus:border-blue-500 transition-colors resize-none"
                                    placeholder="Enter product description"
                                    required
                                >{{ $produto->descricao }}</textarea>
                            </div>

                            <!-- Price and Quantity Row -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Price -->
                                <div>
                                    <label for="preco" class="block text-sm font-medium text-gray-700 mb-2">
                                        <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                        </svg>
                                        Price ($)
                                    </label>
                                    <input 
                                        type="number" 
                                        name="preco" 
                                        id="preco"
                                        step="0.01" 
                                        min="0"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-4 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                        placeholder="0.00"
                                        value="{{ $produto->preco }}"
                                        required
                                    >
                                </div>

                                <!-- Quantity -->
                                <div>
                                    <label for="quantidade" class="block text-sm font-medium text-gray-700 mb-2">
                                        <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10"></path>
                                        </svg>
                                        Quantity
                                    </label>
                                    <input 
                                        type="number" 
                                        name="quantidade" 
                                        id="quantidade"
                                        min="0"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-4 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                        placeholder="0"
                                        value="{{ old('quantidade', $produto->quantidade ?? 0) }}"
                                        required
                                    >
                                </div>
                            </div>

                            <!-- Product Image Upload -->
                            <div>
                                <label for="foto" class="block text-sm font-medium text-gray-700 mb-2">
                                    <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    Update Product Image
                                </label>
                                <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 hover:border-blue-400 transition-colors">
                                    <input 
                                        type="file" 
                                        name="foto" 
                                        id="foto"
                                        accept="image/*"
                                        class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 file:cursor-pointer cursor-pointer"
                                        onchange="previewImage(this)"
                                    >
                                    <p class="text-xs text-gray-500 mt-2">PNG, JPG, GIF up to 10MB (Optional - leave empty to keep current image)</p>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-gray-200">
                                <button 
                                    type="submit" 
                                    class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors flex items-center justify-center space-x-2"
                                >
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                                    </svg>
                                    <span>Update Product</span>
                                </button>
                                
                                <a 
                                    href="{{ route('admin.menu') }}" 
                                    class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold py-3 px-6 rounded-lg transition-colors flex items-center justify-center space-x-2"
                                >
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                                    </svg>
                                    <span>Cancel</span>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for Image Preview -->
    <script>
        function previewImage(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('product-preview').src = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection