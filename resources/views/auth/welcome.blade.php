<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'DashboardPro') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex">
            <!-- Left Panel - Welcome Animation -->
            <div class="flex-1 bg-gradient-to-br from-blue-50 to-indigo-100 flex flex-col items-center justify-center p-8 lg:p-16 relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-blue-500/10 to-indigo-600/10"></div>
                
                <div class="relative z-10 text-center max-w-2xl">
                    <div class="mb-12">
                        <div class="inline-block p-6 rounded-full bg-white/20 backdrop-blur-sm shadow-2xl mb-8 animate-pulse">
                            <div class="h-24 w-24 rounded-full bg-gradient-to-r from-blue-500 to-indigo-600 flex items-center justify-center shadow-xl">
                                <i class="fas fa-chart-line text-white text-4xl"></i>
                            </div>
                        </div>
                        
                        <h1 class="text-6xl lg:text-7xl font-bold text-gray-900 mb-6 tracking-tight leading-tight">
                            Welcome to <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600">DashboardPro</span>
                        </h1>
                        
                        <p class="text-2xl text-gray-700 mb-10 leading-relaxed max-w-3xl mx-auto">
                            Your professional dashboard solution for seamless data management and analytics
                        </p>
                    </div>
                    
                    <!-- Animated Elements -->
                    <div class="flex justify-center space-x-6 mb-12">
                        <div class="w-4 h-4 bg-blue-500 rounded-full animate-bounce" style="animation-delay: 0ms"></div>
                        <div class="w-4 h-4 bg-indigo-500 rounded-full animate-bounce" style="animation-delay: 300ms"></div>
                        <div class="w-4 h-4 bg-purple-500 rounded-full animate-bounce" style="animation-delay: 600ms"></div>
                    </div>
                    
                    <!-- Feature Highlights -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-4xl mx-auto">
                        <div class="bg-white/40 backdrop-blur-sm rounded-xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                            <i class="fas fa-shield-alt text-blue-600 text-2xl mb-3"></i>
                            <h3 class="font-bold text-xl text-gray-800 mb-2">Secure Access</h3>
                            <p class="text-gray-600">Enterprise-grade security with advanced encryption</p>
                        </div>
                        <div class="bg-white/40 backdrop-blur-sm rounded-xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                            <i class="fas fa-bolt text-indigo-600 text-2xl mb-3"></i>
                            <h3 class="font-bold text-xl text-gray-800 mb-2">Fast Performance</h3>
                            <p class="text-gray-600">Optimized for lightning-fast data processing</p>
                        </div>
                        <div class="bg-white/40 backdrop-blur-sm rounded-xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                            <i class="fas fa-chart-bar text-purple-600 text-2xl mb-3"></i>
                            <h3 class="font-bold text-xl text-gray-800 mb-2">Real Analytics</h3>
                            <p class="text-gray-600">Actionable insights with real-time reporting</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Right Panel - Authentication -->
            <div class="w-full lg:w-2/5 xl:w-2/5 flex items-center justify-center bg-white p-8 lg:p-16">
                <div class="w-full max-w-md">
            <!-- Authentication Header -->
            <div class="text-center mb-6">
                <div class="mx-auto h-16 w-16 rounded-full bg-gradient-to-r from-blue-500 to-indigo-600 flex items-center justify-center mb-4 shadow-lg">
                    <i class="fas fa-user-circle text-white text-2xl"></i>
                </div>
                <h2 class="text-2xl font-bold text-gray-900 mb-2">Account Access</h2>
                <p class="text-gray-600">Sign in or create an account</p>
            </div>

            <!-- Toggle Buttons -->
            <div class="flex bg-white rounded-lg shadow-sm p-1 mb-4">
                <button 
                    id="login-tab" 
                    class="flex-1 py-2 px-4 text-center font-medium rounded-md transition-all duration-200 active-tab"
                    onclick="switchTab('login')"
                >
                    Login
                </button>
                <button 
                    id="register-tab" 
                    class="flex-1 py-2 px-4 text-center font-medium rounded-md transition-all duration-200 inactive-tab"
                    onclick="switchTab('register')"
                >
                    Register
                </button>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-2" :status="session('status')" />

            <!-- Login Form -->
            <div id="login-form" class="bg-white py-6 px-6 shadow-xl rounded-lg">
                <form method="POST" action="{{ route('login') }}" class="space-y-4">
                    @csrf
                    
                    <div class="mb-3">
                        <x-input-label for="login-email" :value="__('Email')" class="text-gray-700 font-medium text-sm" />
                        <x-text-input 
                            id="login-email" 
                            class="block mt-1 w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 shadow-sm transition duration-200 bg-white text-gray-700 placeholder-gray-500 text-sm" 
                            type="email" 
                            name="email" 
                            :value="old('email')" 
                            required 
                            autofocus 
                            autocomplete="username" 
                            placeholder="Enter your email"
                        />
                        <x-input-error :messages="$errors->get('email')" class="mt-1 text-red-600 text-sm" />
                    </div>

                    <div>
                        <x-input-label for="login-password" :value="__('Password')" class="text-gray-700 font-medium" />
                        <x-text-input 
                            id="login-password" 
                            class="block mt-1 w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 shadow-sm transition duration-200 bg-white text-gray-700 placeholder-gray-500" 
                            type="password" 
                            name="password" 
                            required 
                            autocomplete="current-password" 
                            placeholder="Enter your password"
                        />
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600" />
                    </div>

                    <div class="flex items-center justify-between">
                        <label for="remember_me" class="flex items-center">
                            <input 
                                id="remember_me" 
                                type="checkbox" 
                                class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500" 
                                name="remember"
                            >
                            <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                        
                        @if (Route::has('password.request'))
                            <a class="text-sm text-blue-600 hover:text-blue-800 font-medium" href="{{ route('password.request') }}">
                                {{ __('Forgot password?') }}
                            </a>
                        @endif
                    </div>

                    <button 
                        type="submit" 
                        class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-semibold text-white bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-blue-600 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200 transform hover:scale-[1.02]"
                    >
                        {{ __('Sign In') }}
                    </button>
                </form>
            </div>

            <!-- Register Form -->
            <div id="register-form" class="bg-white py-6 px-6 shadow-xl rounded-lg hidden">
                <form method="POST" action="{{ route('register') }}" class="space-y-4">
                    @csrf
                    
                    <div>
                        <x-input-label for="register-name" :value="__('Full Name')" class="text-gray-700 font-medium" />
                        <x-text-input 
                            id="register-name" 
                            class="block mt-1 w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm transition duration-200 bg-white text-gray-700 placeholder-gray-500" 
                            type="text" 
                            name="name" 
                            :value="old('name')" 
                            required 
                            autofocus 
                            autocomplete="name" 
                            placeholder="Enter your full name"
                        />
                        <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-600" />
                    </div>

                    <div>
                        <x-input-label for="register-email" :value="__('Email')" class="text-gray-700 font-medium" />
                        <x-text-input 
                            id="register-email" 
                            class="block mt-1 w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm transition duration-200 bg-white text-gray-700 placeholder-gray-500" 
                            type="email" 
                            name="email" 
                            :value="old('email')" 
                            required 
                            autocomplete="username" 
                            placeholder="Enter your email"
                        />
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600" />
                    </div>

                    <div>
                        <x-input-label for="register-password" :value="__('Password')" class="text-gray-700 font-medium" />
                        <x-text-input 
                            id="register-password" 
                            class="block mt-1 w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm transition duration-200 bg-white text-gray-700 placeholder-gray-500" 
                            type="password" 
                            name="password" 
                            required 
                            autocomplete="new-password" 
                            placeholder="Create a password"
                        />
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600" />
                    </div>

                    <div>
                        <x-input-label for="register-password_confirmation" :value="__('Confirm Password')" class="text-gray-700 font-medium" />
                        <x-text-input 
                            id="register-password_confirmation" 
                            class="block mt-1 w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm transition duration-200 bg-white text-gray-700 placeholder-gray-500" 
                            type="password" 
                            name="password_confirmation" 
                            required 
                            autocomplete="new-password" 
                            placeholder="Confirm your password"
                        />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-600" />
                    </div>

                    <button 
                        type="submit" 
                        class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-semibold text-white bg-gradient-to-r from-indigo-500 to-purple-600 hover:from-indigo-600 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200 transform hover:scale-[1.02]"
                    >
                        {{ __('Create Account') }}
                    </button>
                </form>
            </div>

            <!-- Footer Links -->
            <div class="text-center text-sm text-gray-600">
                <p id="footer-text-login" class="block">
                    Don't have an account? 
                    <button onclick="switchTab('register')" class="text-blue-600 hover:text-blue-800 font-medium underline">
                        Register here
                    </button>
                </p>
                <p id="footer-text-register" class="hidden">
                    Already have an account? 
                    <button onclick="switchTab('login')" class="text-blue-600 hover:text-blue-800 font-medium underline">
                        Sign in here
                    </button>
                </p>
            </div>
        </div>
    </div>

    <script>
        function switchTab(tab) {
            const loginForm = document.getElementById('login-form');
            const registerForm = document.getElementById('register-form');
            const loginTab = document.getElementById('login-tab');
            const registerTab = document.getElementById('register-tab');
            const footerLogin = document.getElementById('footer-text-login');
            const footerRegister = document.getElementById('footer-text-register');

            if (tab === 'login') {
                loginForm.classList.remove('hidden');
                registerForm.classList.add('hidden');
                loginTab.classList.add('active-tab');
                loginTab.classList.remove('inactive-tab');
                registerTab.classList.add('inactive-tab');
                registerTab.classList.remove('active-tab');
                footerLogin.classList.remove('hidden');
                footerLogin.classList.add('block');
                footerRegister.classList.add('hidden');
                footerRegister.classList.remove('block');
            } else {
                loginForm.classList.add('hidden');
                registerForm.classList.remove('hidden');
                loginTab.classList.add('inactive-tab');
                loginTab.classList.remove('active-tab');
                registerTab.classList.add('active-tab');
                registerTab.classList.remove('inactive-tab');
                footerLogin.classList.add('hidden');
                footerLogin.classList.remove('block');
                footerRegister.classList.remove('hidden');
                footerRegister.classList.add('block');
            }
        }

        // Check for validation errors and switch to appropriate tab
        document.addEventListener('DOMContentLoaded', function() {
            const loginErrors = document.querySelectorAll('#login-form .text-red-600');
            const registerErrors = document.querySelectorAll('#register-form .text-red-600');
            
            if (registerErrors.length > 0) {
                switchTab('register');
            } else if (loginErrors.length > 0) {
                switchTab('login');
            }
        });
    </script>

    <style>
        .active-tab {
            background: linear-gradient(to right, #3b82f6, #4f46e5);
            color: white;
            box-shadow: 0 2px 4px rgba(59, 130, 246, 0.3);
        }
        
        .inactive-tab {
            background: white;
            color: #4b5563;
        }
        
        .inactive-tab:hover {
            background: #f9fafb;
            color: #1f2937;
        }
    </style>
                </div>
            </div>
        </div>
    </body>
</html>