@extends('layout.app')

@section('title', 'Welcome to NEXO')

@section('content')
    <!-- Error Message -->
    @if ($message = session('message'))
        <div id="error-message"
            class="fixed top-4 left-4 z-50 transform scale-0 opacity-0 transition-all duration-300 ease-out">
            <div class="bg-red-500 text-white px-6 py-4 rounded-lg shadow-lg max-w-sm flex items-center space-x-3">
                <svg class="w-6 h-6 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                </svg>
                <span class="font-medium">{{ $message }}</span>
                <button onclick="hideErrorMessage()" class="ml-auto text-white hover:text-gray-200 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
        </div>

        <script>
            // Show error message with explosion animation
            document.addEventListener('DOMContentLoaded', function() {
                const message = document.getElementById('error-message');
                if (message) {
                    // Explosion effect
                    setTimeout(() => {
                        message.classList.remove('scale-0', 'opacity-0');
                        message.classList.add('scale-110', 'opacity-100');
                        
                        setTimeout(() => {
                            message.classList.remove('scale-110');
                            message.classList.add('scale-100');
                        }, 150);
                    }, 100);

                    // Auto hide after 5 seconds
                    setTimeout(() => {
                        hideErrorMessage();
                    }, 5000);
                }
            });

            function hideErrorMessage() {
                const message = document.getElementById('error-message');
                if (message) {
                    message.classList.remove('scale-100', 'opacity-100');
                    message.classList.add('scale-0', 'opacity-0');

                    setTimeout(() => {
                        message.remove();
                    }, 300);
                }
            }
        </script>
    @endif

    <!-- Full Screen Homepage Layout -->
    <div class="min-h-screen bg-gradient-to-br from-blue-900 via-blue-800 to-blue-900 flex items-center justify-center px-4">
        <div class="max-w-6xl mx-auto">
            
            <!-- Main Content Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                
                <!-- Left Side - Brand & Description -->
                <div class="text-center lg:text-left space-y-8">
                    
                    <!-- Logo/Brand Section -->
                    <div class="space-y-6">
                        <div class="inline-flex items-center justify-center w-24 h-24 bg-white rounded-full shadow-2xl">
                            <svg class="w-12 h-12 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        
                        <div>
                            <h1 class="text-6xl lg:text-7xl font-bold text-white mb-4 tracking-tight">
                                NEXO
                            </h1>
                            <p class="text-xl lg:text-2xl text-blue-200 font-light">
                                Your Gateway to Innovation
                            </p>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="space-y-6">
                        <p class="text-lg text-blue-100 leading-relaxed max-w-2xl">
                            Discover a world of cutting-edge products and seamless shopping experiences. 
                            Join thousands of satisfied customers who trust NEXO for quality, innovation, and excellence.
                        </p>
                        
                        <!-- Features List -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 max-w-2xl">
                            <div class="flex items-center space-x-3 text-blue-100">
                                <svg class="w-6 h-6 text-green-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Premium Quality Products</span>
                            </div>
                            <div class="flex items-center space-x-3 text-blue-100">
                                <svg class="w-6 h-6 text-green-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Fast & Secure Delivery</span>
                            </div>
                            <div class="flex items-center space-x-3 text-blue-100">
                                <svg class="w-6 h-6 text-green-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>24/7 Customer Support</span>
                            </div>
                            <div class="flex items-center space-x-3 text-blue-100">
                                <svg class="w-6 h-6 text-green-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Money-Back Guarantee</span>
                            </div>
                        </div>
                    </div>

                    <!-- Stats -->
                    <div class="grid grid-cols-3 gap-8 pt-8 border-t border-blue-700">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-white">50K+</div>
                            <div class="text-blue-200 text-sm">Happy Customers</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-white">10K+</div>
                            <div class="text-blue-200 text-sm">Products</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-white">99%</div>
                            <div class="text-blue-200 text-sm">Satisfaction</div>
                        </div>
                    </div>
                </div>

                <!-- Right Side - Authentication Card -->
                <div class="flex justify-center lg:justify-end">
                    <div class="bg-white rounded-2xl shadow-2xl p-8 w-full max-w-md">
                        
                        <!-- Card Header -->
                        <div class="text-center mb-8">
                            <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                                </svg>
                            </div>
                            <h2 class="text-2xl font-bold text-gray-900 mb-2">Get Started</h2>
                            <p class="text-gray-600">Choose an option to continue</p>
                        </div>

                        <!-- Authentication Buttons -->
                        <div class="space-y-4">
                            
                            <!-- Sign In Button -->
                            <a href="{{ route('login') }}" 
                               class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-4 px-6 rounded-lg transition-all duration-200 flex items-center justify-center space-x-3 group transform hover:scale-105"
                            >
                                <svg class="w-6 h-6 group-hover:animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                                </svg>
                                <span class="text-lg">Sign In to Your Account</span>
                            </a>

                            <!-- Divider -->
                            <div class="relative flex items-center">
                                <div class="flex-grow border-t border-gray-300"></div>
                                <span class="flex-shrink-0 px-4 text-gray-500 text-sm font-medium">OR</span>
                                <div class="flex-grow border-t border-gray-300"></div>
                            </div>

                            <!-- Sign Up Button -->
                            <a href="{{ route('registro') }}" 
                               class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-4 px-6 rounded-lg transition-all duration-200 flex items-center justify-center space-x-3 group transform hover:scale-105"
                            >
                                <svg class="w-6 h-6 group-hover:animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                                </svg>
                                <span class="text-lg">Create New Account</span>
                            </a>
                        </div>

                        <!-- Additional Info -->
                        <div class="mt-8 p-4 bg-gray-50 rounded-lg">
                            <div class="flex items-start space-x-3">
                                <svg class="w-6 h-6 text-blue-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <div>
                                    <h4 class="font-semibold text-gray-900 text-sm">Why Join NEXO?</h4>
                                    <p class="text-gray-600 text-sm mt-1">
                                        Access exclusive deals, track your orders, and enjoy personalized recommendations tailored just for you.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Social Proof -->
                        <div class="mt-6 text-center">
                            <p class="text-xs text-gray-500 mb-3">Trusted by thousands of customers worldwide</p>
                            <div class="flex justify-center space-x-1">
                                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                                <span class="ml-2 text-sm text-gray-600">4.9/5 rating</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="text-center mt-16">
                <p class="text-white text-sm opacity-75">
                    © 2025 NEXO. All rights reserved.
                </p>
            </div>
        </div>
    </div>

    <!-- JavaScript for Enhanced Interactions -->
    <script>
        // Add subtle animations on load
        document.addEventListener('DOMContentLoaded', function() {
            // Animate elements on load
            const animatedElements = document.querySelectorAll('.transform');
            animatedElements.forEach((el, index) => {
                setTimeout(() => {
                    el.style.opacity = '0';
                    el.style.transform = 'translateY(20px)';
                    el.style.transition = 'all 0.6s ease-out';
                    
                    setTimeout(() => {
                        el.style.opacity = '1';
                        el.style.transform = 'translateY(0)';
                    }, 100);
                }, index * 100);
            });
        });

        // Add hover effects for auth buttons
        document.querySelectorAll('a[href*="route"]').forEach(button => {
            button.addEventListener('mouseenter', function() {
                this.style.transform = 'scale(1.05) translateY(-2px)';
                this.style.boxShadow = '0 10px 25px rgba(0, 0, 0, 0.2)';
            });
            
            button.addEventListener('mouseleave', function() {
                this.style.transform = 'scale(1) translateY(0)';
                this.style.boxShadow = '';
            });
        });

        // Add click ripple effect
        document.querySelectorAll('a[href*="route"]').forEach(button => {
            button.addEventListener('click', function(e) {
                const ripple = document.createElement('span');
                const rect = this.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;
                
                ripple.style.width = ripple.style.height = size + 'px';
                ripple.style.left = x + 'px';
                ripple.style.top = y + 'px';
                ripple.classList.add('ripple');
                
                this.appendChild(ripple);
                
                setTimeout(() => {
                    ripple.remove();
                }, 600);
            });
        });
    </script>

    <!-- CSS for Ripple Effect -->
    <style>
        .ripple {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: scale(0);
            animation: ripple-animation 0.6s linear;
            pointer-events: none;
        }
        
        @keyframes ripple-animation {
            to {
                transform: scale(2);
                opacity: 0;
            }
        }
    </style>
@endsection