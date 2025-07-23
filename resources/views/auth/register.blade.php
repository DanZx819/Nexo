@extends('layout.app')

@section('title', 'Register - Nexo')

@section('content')
    <!-- Full Screen Register Layout -->
    <div class="min-h-screen bg-gradient-to-br from-blue-900 via-blue-800 to-blue-900 flex items-center justify-center px-4 py-8">
        <div class="max-w-md w-full">
            
            <!-- Success Message -->
            @if ($message = session('message'))
                <div id="success-message" class="mb-6 transform -translate-y-4 opacity-0 transition-all duration-500 ease-out">
                    <div class="bg-green-500 text-white px-6 py-4 rounded-lg shadow-lg flex items-center space-x-3">
                        <svg class="w-6 h-6 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="font-medium">{{ $message }}</span>
                    </div>
                </div>

                <script>
                    // Show success message with animation
                    document.addEventListener('DOMContentLoaded', function() {
                        const message = document.getElementById('success-message');
                        if (message) {
                            // Slide in from top
                            setTimeout(() => {
                                message.classList.remove('-translate-y-4', 'opacity-0');
                                message.classList.add('translate-y-0', 'opacity-100');
                            }, 100);
                            
                            // Auto hide after 5 seconds
                            setTimeout(() => {
                                message.classList.remove('translate-y-0', 'opacity-100');
                                message.classList.add('-translate-y-4', 'opacity-0');
                                
                                // Remove from DOM after animation
                                setTimeout(() => {
                                    message.remove();
                                }, 500);
                            }, 5000);
                        }
                    });
                </script>
            @endif

            <!-- Register Card -->
            <div class="bg-white rounded-2xl shadow-2xl p-8">
                <!-- Header -->
                <div class="text-center mb-8">
                    <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                        </svg>
                    </div>
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">Join NEXO</h1>
                    <p class="text-gray-600">Create your account to get started</p>
                </div>

                <!-- Register Form -->
                <form action="{{ route('registro') }}" method="post" class="space-y-6">
                    @csrf
                    
                    <!-- Name Field -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                            <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Full Name
                        </label>
                        <div class="relative">
                            <input 
                                type="text" 
                                name="name" 
                                id="name"
                                class="w-full px-4 py-3 pl-12 border border-gray-300 rounded-lg focus:ring-4 focus:ring-green-500 focus:border-green-500 transition-all duration-200"
                                placeholder="Enter your full name"
                                required
                                autocomplete="name"
                            >
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Email Field -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                            <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                            </svg>
                            Email Address
                        </label>
                        <div class="relative">
                            <input 
                                type="email" 
                                name="email" 
                                id="email"
                                class="w-full px-4 py-3 pl-12 border border-gray-300 rounded-lg focus:ring-4 focus:ring-green-500 focus:border-green-500 transition-all duration-200"
                                placeholder="Enter your email address"
                                required
                                autocomplete="email"
                            >
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Password Field -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                            <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                            Password
                        </label>
                        <div class="relative">
                            <input 
                                type="password" 
                                name="password" 
                                id="password"
                                class="w-full px-4 py-3 pl-12 pr-12 border border-gray-300 rounded-lg focus:ring-4 focus:ring-green-500 focus:border-green-500 transition-all duration-200"
                                placeholder="Create a strong password"
                                required
                                autocomplete="new-password"
                            >
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            </div>
                            <!-- Show/Hide Password Button -->
                            <button 
                                type="button" 
                                class="absolute inset-y-0 right-0 pr-3 flex items-center"
                                onclick="togglePassword('password')"
                            >
                                <svg id="eye-closed-1" class="w-5 h-5 text-gray-400 hover:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21"></path>
                                </svg>
                                <svg id="eye-open-1" class="w-5 h-5 text-gray-400 hover:text-gray-600 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Confirm Password Field -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">
                            <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.414-4.414a2 2 0 00-2.828 0L4 16.172V20h3.828l8.586-8.586a2 2 0 000-2.828z"></path>
                            </svg>
                            Confirm Password
                        </label>
                        <div class="relative">
                            <input 
                                type="password" 
                                name="password_confirmation" 
                                id="password_confirmation"
                                class="w-full px-4 py-3 pl-12 pr-12 border border-gray-300 rounded-lg focus:ring-4 focus:ring-green-500 focus:border-green-500 transition-all duration-200"
                                placeholder="Confirm your password"
                                required
                                autocomplete="new-password"
                            >
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.414-4.414a2 2 0 00-2.828 0L4 16.172V20h3.828l8.586-8.586a2 2 0 000-2.828z"></path>
                                </svg>
                            </div>
                            <!-- Show/Hide Password Button -->
                            <button 
                                type="button" 
                                class="absolute inset-y-0 right-0 pr-3 flex items-center"
                                onclick="togglePassword('password_confirmation')"
                            >
                                <svg id="eye-closed-2" class="w-5 h-5 text-gray-400 hover:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21"></path>
                                </svg>
                                <svg id="eye-open-2" class="w-5 h-5 text-gray-400 hover:text-gray-600 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Terms and Conditions -->
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input 
                                id="terms" 
                                name="terms" 
                                type="checkbox" 
                                class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded"
                                required
                            >
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="terms" class="text-gray-700">
                                I agree to the 
                                <a href="#" class="text-green-600 hover:text-green-500 font-medium">Terms of Service</a> 
                                and 
                                <a href="#" class="text-green-600 hover:text-green-500 font-medium">Privacy Policy</a>
                            </label>
                        </div>
                    </div>

                    <!-- Register Button -->
                    <button 
                        type="submit" 
                        class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-4 rounded-lg transition-all duration-200 flex items-center justify-center space-x-2 focus:ring-4 focus:ring-green-500 focus:ring-opacity-50"
                    >
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                        </svg>
                        <span>Create Account</span>
                    </button>
                </form>

                <!-- Divider -->
                <div class="mt-8 border-t border-gray-200 pt-6">
                    <p class="text-center text-sm text-gray-600">
                        Already have an account? 
                        <a href="{{ route('login') }}" class="text-green-600 hover:text-green-500 font-medium">Sign in here</a>
                    </p>
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

    <!-- JavaScript for Password Toggle -->
    <script>
        function togglePassword(fieldId) {
            const passwordInput = document.getElementById(fieldId);
            const eyeClosedId = fieldId === 'password' ? 'eye-closed-1' : 'eye-closed-2';
            const eyeOpenId = fieldId === 'password' ? 'eye-open-1' : 'eye-open-2';
            const eyeClosed = document.getElementById(eyeClosedId);
            const eyeOpen = document.getElementById(eyeOpenId);
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeClosed.classList.add('hidden');
                eyeOpen.classList.remove('hidden');
            } else {
                passwordInput.type = 'password';
                eyeClosed.classList.remove('hidden');
                eyeOpen.classList.add('hidden');
            }
        }

        // Real-time password confirmation validation
        document.getElementById('password_confirmation').addEventListener('input', function() {
            const password = document.getElementById('password').value;
            const confirmPassword = this.value;
            
            if (confirmPassword && password !== confirmPassword) {
                this.classList.remove('border-gray-300', 'focus:border-green-500');
                this.classList.add('border-red-300', 'focus:border-red-500');
            } else {
                this.classList.remove('border-red-300', 'focus:border-red-500');
                this.classList.add('border-gray-300', 'focus:border-green-500');
            }
        });
    </script>
@endsection