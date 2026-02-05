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
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                            Laravel Migrations, Factories, Seeders, Routes,
                            Views, and Authentication Scaffolding using Breeze
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
                            <i class="fas fa-database text-blue-600 text-2xl mb-3"></i>
                            <h3 class="font-bold text-xl text-gray-800 mb-2">Database Migrations</h3>
                            <p class="text-gray-600">Modify database schema using Laravel migrations</p>
                        </div>
                        <div class="bg-white/40 backdrop-blur-sm rounded-xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                            <i class="fas fa-seedling text-green-600 text-2xl mb-3"></i>
                            <h3 class="font-bold text-xl text-gray-800 mb-2">Data Population</h3>
                            <p class="text-gray-600">Populate database tables using factories and seeders</p>
                        </div>
                        <div class="bg-white/40 backdrop-blur-sm rounded-xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                            <i class="fas fa-key text-indigo-600 text-2xl mb-3"></i>
                            <h3 class="font-bold text-xl text-gray-800 mb-2">Authentication</h3>
                            <p class="text-gray-600">Implement authentication using Laravel Breeze</p>
                        </div>
                        <div class="bg-white/40 backdrop-blur-sm rounded-xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                            <i class="fas fa-directions text-orange-600 text-2xl mb-3"></i>
                            <h3 class="font-bold text-xl text-gray-800 mb-2">Routing</h3>
                            <p class="text-gray-600">Configure routes and redirects after authentication</p>
                        </div>
                        <div class="bg-white/40 backdrop-blur-sm rounded-xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                            <i class="fas fa-desktop text-purple-600 text-2xl mb-3"></i>
                            <h3 class="font-bold text-xl text-gray-800 mb-2">Dashboard</h3>
                            <p class="text-gray-600">Design a basic dashboard view using a frontend template framework</p>
                        </div>
                        <div class="bg-white/40 backdrop-blur-sm rounded-xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                            <i class="fas fa-graduation-cap text-red-600 text-2xl mb-3"></i>
                            <h3 class="font-bold text-xl text-gray-800 mb-2">Project Description</h3>
                            <p class="text-gray-600">Students are expected to demonstrate proper use of Laravel conventions and best practices.</p>
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
            <x-auth-session-status class="mb-2" :status="session('status')" data-session-status />
            
            <!-- Hidden inputs to pass success/failure status -->
            @if(session('status'))
                <input type="hidden" id="auth-success-message" value="{{ session('status') }}">
            @endif
            
            @if($errors->any())
                <input type="hidden" id="auth-error-message" value="{{ $errors->first() }}">
            @endif

            <!-- Login Form -->
            <div id="login-form" class="bg-white py-6 px-6 shadow-xl rounded-lg transition-all duration-300 ease-in-out" style="min-height: 420px;">
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
            <div id="register-form" class="bg-white py-6 px-6 shadow-xl rounded-lg hidden transition-all duration-300 ease-in-out" style="min-height: 420px;">
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
        // SweetAlert2 Notification Functions
        function showSuccessAlert(message) {
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: message,
                timer: 3000,
                timerProgressBar: true,
                showConfirmButton: false,
                toast: true,
                position: 'top-end'
            });
        }
        
        function showErrorAlert(message) {
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: message,
                timer: 5000,
                timerProgressBar: true,
                showConfirmButton: true,
                confirmButtonText: 'OK'
            });
        }
        
        function showLogoutConfirmation() {
            Swal.fire({
                title: 'Are you sure?',
                text: "Do you really want to logout?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, logout me out!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Proceed with logout
                    document.getElementById('logout-form').submit();
                }
            });
        }
        
        // Form submission handlers
        // Both login and register forms use standard Laravel submission with session flashing for SweetAlert2 notifications
        function switchTab(tab) {
            const loginForm = document.getElementById('login-form');
            const registerForm = document.getElementById('register-form');
            const loginTab = document.getElementById('login-tab');
            const registerTab = document.getElementById('register-tab');
            const footerLogin = document.getElementById('footer-text-login');
            const footerRegister = document.getElementById('footer-text-register');

            // Add transition class for smooth animation
            loginForm.classList.add('transition-opacity', 'duration-200');
            registerForm.classList.add('transition-opacity', 'duration-200');

            // Fade out both forms
            loginForm.style.opacity = '0';
            registerForm.style.opacity = '0';

            // Reset tab states
            loginTab.classList.remove('active-tab');
            loginTab.classList.add('inactive-tab');
            registerTab.classList.remove('active-tab');
            registerTab.classList.add('inactive-tab');

            // Hide footers
            footerLogin.style.display = 'none';
            footerRegister.style.display = 'none';

            // Wait for fade out, then switch content
            setTimeout(() => {
                if (tab === 'login') {
                    // Show login form
                    loginForm.style.display = 'block';
                    registerForm.style.display = 'none';
                    
                    loginTab.classList.remove('inactive-tab');
                    loginTab.classList.add('active-tab');
                    
                    footerLogin.style.display = 'block';
                } else {
                    // Show register form
                    registerForm.style.display = 'block';
                    loginForm.style.display = 'none';
                    
                    registerTab.classList.remove('inactive-tab');
                    registerTab.classList.add('active-tab');
                    
                    footerRegister.style.display = 'block';
                }

                // Fade in the active form
                setTimeout(() => {
                    loginForm.style.opacity = '1';
                    registerForm.style.opacity = '1';
                }, 50);
            }, 200);
        }

        // Check for validation errors and switch to appropriate tab
        document.addEventListener('DOMContentLoaded', function() {
            const loginErrors = document.querySelectorAll('#login-form .text-red-600');
            const registerErrors = document.querySelectorAll('#register-form .text-red-600');
            
            // Check URL parameters first for auth messages
            const urlParams = new URLSearchParams(window.location.search);
            const successParam = urlParams.get('auth_success');
            const errorParam = urlParams.get('auth_error');
            
            console.log('URL success param:', successParam);
            console.log('URL error param:', errorParam);
            
            if (successParam) {
                showSuccessAlert(decodeURIComponent(successParam));
                // Remove the parameter from URL
                urlParams.delete('auth_success');
                const newUrl = window.location.pathname + (urlParams.toString() ? '?' + urlParams.toString() : '');
                window.history.replaceState({}, document.title, newUrl);
                return; // Don't check other sources if we have URL params
            } else if (errorParam) {
                showErrorAlert(decodeURIComponent(errorParam));
                // Remove the parameter from URL
                urlParams.delete('auth_error');
                const newUrl = window.location.pathname + (urlParams.toString() ? '?' + urlParams.toString() : '');
                window.history.replaceState({}, document.title, newUrl);
                return; // Don't check other sources if we have URL params
            }
            
            // Check for session status messages (fallback)
            const sessionStatus = document.querySelector('[data-session-status]');
            console.log('Session status element:', sessionStatus);
            console.log('Session status text:', sessionStatus ? sessionStatus.textContent : 'No element found');
            
            // Also check for Laravel's default session status class
            const defaultSessionStatus = document.querySelector('.alert-success, .alert-error, .text-success, .text-danger');
            console.log('Default session status element:', defaultSessionStatus);
            console.log('Default session status text:', defaultSessionStatus ? defaultSessionStatus.textContent : 'No element found');
            
            // Check for hidden input messages
            const successMessageInput = document.getElementById('auth-success-message');
            const errorMessageInput = document.getElementById('auth-error-message');
            console.log('Success message input:', successMessageInput);
            console.log('Error message input:', errorMessageInput);
            console.log('Success message value:', successMessageInput ? successMessageInput.value : 'No input found');
            console.log('Error message value:', errorMessageInput ? errorMessageInput.value : 'No input found');
            
            let message = '';
            let isErrorMessage = false;
            
            if (sessionStatus && sessionStatus.textContent.trim()) {
                message = sessionStatus.textContent.trim();
                console.log('Using custom session message:', message);
            } else if (defaultSessionStatus && defaultSessionStatus.textContent.trim()) {
                message = defaultSessionStatus.textContent.trim();
                console.log('Using default session message:', message);
                isErrorMessage = defaultSessionStatus.classList.contains('alert-error') || defaultSessionStatus.classList.contains('text-danger');
            } else if (successMessageInput && successMessageInput.value.trim()) {
                message = successMessageInput.value.trim();
                console.log('Using success input message:', message);
            } else if (errorMessageInput && errorMessageInput.value.trim()) {
                message = errorMessageInput.value.trim();
                console.log('Using error input message:', message);
                isErrorMessage = true;
            }
            
            if (message) {
                // Determine if it's success or error based on content
                if (!isErrorMessage) {
                    isErrorMessage = message.toLowerCase().includes('failed') || message.toLowerCase().includes('error') || message.toLowerCase().includes('invalid');
                }
                
                if (isErrorMessage) {
                    showErrorAlert(message);
                } else {
                    showSuccessAlert(message);
                }
            } else {
                // Fallback: Check URL parameters for success messages
                console.log('No session message found, checking URL parameters');
                            
                const urlParams = new URLSearchParams(window.location.search);
                const successParam = urlParams.get('auth_success');
                const errorParam = urlParams.get('auth_error');
                            
                console.log('URL success param:', successParam);
                console.log('URL error param:', errorParam);
                            
                if (successParam) {
                    showSuccessAlert(decodeURIComponent(successParam));
                    // Remove the parameter from URL
                    urlParams.delete('auth_success');
                    const newUrl = window.location.pathname + (urlParams.toString() ? '?' + urlParams.toString() : '');
                    window.history.replaceState({}, document.title, newUrl);
                } else if (errorParam) {
                    showErrorAlert(decodeURIComponent(errorParam));
                    // Remove the parameter from URL
                    urlParams.delete('auth_error');
                    const newUrl = window.location.pathname + (urlParams.toString() ? '?' + urlParams.toString() : '');
                    window.history.replaceState({}, document.title, newUrl);
                }
            }
            
            if (registerErrors.length > 0) {
                switchTab('register');
                showErrorAlert('Please fix the registration errors below');
            } else if (loginErrors.length > 0) {
                switchTab('login');
                showErrorAlert('Please fix the login errors below');
            } else {
                // Default to login tab
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