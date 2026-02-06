<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    
    <!-- SweetAlert2 for notifications -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div class="min-h-screen bg-white py-8 px-4 sm:px-6 lg:px-8 relative overflow-hidden hide-scrollbar">
        <div class="max-w-none mx-0 w-full relative z-10">
            <!-- Professional Welcome Section -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 mb-8">
                <div class="p-6 sm:p-8">
                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
                        <div class="flex items-center">
                            <div class="p-3 bg-blue-100 rounded-lg mr-4">
                                <i class="fas fa-user text-blue-600 text-2xl"></i>
                            </div>
                            <div>
                                <h1 class="text-2xl sm:text-3xl font-bold text-gray-900">Welcome back, {{ $user->name }}!</h1>
                                <p class="text-gray-600 mt-1">You're successfully logged into your dashboard</p>
                            </div>
                        </div>
                        <div class="flex items-center justify-center lg:justify-end">
                            <div class="flex items-center px-3 py-2 bg-green-50 rounded-full mr-4">
                                <div class="w-2 h-2 bg-green-500 rounded-full mr-2"></div>
                                <span class="text-sm font-medium text-green-700">Online</span>
                            </div>
                            <!-- Big Polar Bear Animation -->
                            <div class="polar-bear-container relative">
                                <div class="polar-bear text-6xl lg:text-7xl animate-bounce cursor-pointer" title="Hello there!">🐻‍❄️</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Professional Stats Cards Section -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 px-4 sm:px-6 lg:px-8 mb-8">
                <!-- Total Users Card -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow duration-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500 uppercase tracking-wide">Total Users</p>
                            <p class="text-3xl font-bold text-gray-900 mt-1">{{ $userCount }}</p>
                            <p class="text-sm text-gray-500 mt-1">In our system</p>
                        </div>
                        <div class="p-3 bg-blue-50 rounded-lg">
                            <i class="fas fa-users text-blue-600 text-xl"></i>
                        </div>
                    </div>
                    <div class="mt-4 pt-4 border-t border-gray-100">
                        <div class="flex items-center text-sm text-gray-500">
                            <span class="h-2 w-2 bg-blue-500 rounded-full mr-2"></span>
                            System metrics
                        </div>
                    </div>
                </div>

                <!-- Active Users Card -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow duration-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500 uppercase tracking-wide">Active Users</p>
                            <p class="text-3xl font-bold text-gray-900 mt-1">{{ $activeUsers }}</p>
                            <p class="text-sm text-gray-500 mt-1">Currently online</p>
                        </div>
                        <div class="p-3 bg-green-50 rounded-lg">
                            <i class="fas fa-user-check text-green-600 text-xl"></i>
                        </div>
                    </div>
                    <div class="mt-4 pt-4 border-t border-gray-100">
                        <div class="flex items-center text-sm text-gray-500">
                            <span class="h-2 w-2 bg-green-500 rounded-full mr-2"></span>
                            Real-time status
                        </div>
                    </div>
                </div>

                <!-- Recent Activity Card -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow duration-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500 uppercase tracking-wide">Recent Logins</p>
                            <p class="text-3xl font-bold text-gray-900 mt-1">{{ $recentLogins }}</p>
                            <p class="text-sm text-gray-500 mt-1">Last 7 days</p>
                        </div>
                        <div class="p-3 bg-purple-50 rounded-lg">
                            <i class="fas fa-history text-purple-600 text-xl"></i>
                        </div>
                    </div>
                    <div class="mt-4 pt-4 border-t border-gray-100">
                        <div class="flex items-center text-sm text-gray-500">
                            <span class="h-2 w-2 bg-purple-500 rounded-full mr-2"></span>
                            Activity tracking
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 px-4 sm:px-6 lg:px-8">
                <!-- Professional User Info Card -->
                <div class="bg-white rounded-xl p-6 border border-gray-200 shadow-sm group">
                    <div class="flex items-center mb-6">
                        <div class="p-3 bg-gray-100 rounded-lg mr-3">
                            <i class="fas fa-id-card text-gray-600 text-xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Your Profile</h3>
                    </div>
                    
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg border border-gray-100 hover:bg-blue-50 hover:border-blue-200 transition-all duration-300 transform hover:-translate-y-1 hover:shadow-md">
                            <div class="flex items-center">
                                <i class="fas fa-user-circle text-gray-500 mr-3 transition-colors duration-300 group-hover:text-blue-600"></i>
                                <span class="text-gray-600 font-medium">Username:</span>
                            </div>
                            <span class="text-gray-800 font-semibold">{{ $user->username }}</span>
                        </div>
                        
                        <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg border border-gray-100 hover:bg-blue-50 hover:border-blue-200 transition-all duration-300 transform hover:-translate-y-1 hover:shadow-md">
                            <div class="flex items-center">
                                <i class="fas fa-signature text-gray-500 mr-3 transition-colors duration-300 group-hover:text-blue-600"></i>
                                <span class="text-gray-600 font-medium">Name:</span>
                            </div>
                            <span class="text-gray-800 font-semibold">{{ $user->name }}</span>
                        </div>
                        
                        <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg border border-gray-100 hover:bg-blue-50 hover:border-blue-200 transition-all duration-300 transform hover:-translate-y-1 hover:shadow-md">
                            <div class="flex items-center">
                                <i class="fas fa-envelope text-gray-500 mr-3 transition-colors duration-300 group-hover:text-blue-600"></i>
                                <span class="text-gray-600 font-medium">Email:</span>
                            </div>
                            <span class="text-gray-800 font-semibold">{{ $user->email }}</span>
                        </div>
                        
                        <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg border border-gray-100 hover:bg-blue-50 hover:border-blue-200 transition-all duration-300 transform hover:-translate-y-1 hover:shadow-md">
                            <div class="flex items-center">
                                <i class="fas fa-power-off text-gray-500 mr-3 transition-colors duration-300 group-hover:text-blue-600"></i>
                                <span class="text-gray-600 font-medium">Status:</span>
                            </div>
                            <span class="px-3 py-1 rounded-full text-sm font-semibold 
                                {{ $user->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $user->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Professional Quick Actions Card -->
                <div class="bg-white rounded-xl p-6 border border-gray-200 shadow-sm">
                    <div class="flex items-center mb-6">
                        <div class="p-3 bg-gray-100 rounded-lg mr-3">
                            <i class="fas fa-bolt text-gray-600 text-xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Quick Actions</h3>
                    </div>
                    
                    <div class="space-y-4">
                        <a href="{{ route('profile.edit') }}" 
                           class="block w-full text-center bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-lg transition-colors duration-200">
                            <i class="fas fa-user-edit mr-2"></i>
                            Edit Profile
                        </a>
                        
                        <button onclick="showLastLogin()" 
                                class="block w-full text-center bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold py-3 px-4 rounded-lg border border-gray-200 transition-colors duration-200">
                            <i class="fas fa-history mr-2"></i>
                            Show Last Login
                        </button>
                    </div>
                    
                    <div id="last-login-info" class="mt-6 p-4 bg-blue-50 rounded-lg border border-blue-100 hidden transition-all duration-300">
                        <div class="flex items-start">
                            <i class="fas fa-info-circle text-blue-500 mt-1 mr-3"></i>
                            <div>
                                <p class="text-blue-800 font-semibold mb-1">Account Information</p>
                                <div class="space-y-2 text-sm text-gray-600">
                                    @php
                                        $isFirstLogin = !$user->last_login || 
                                                       ($user->wasRecentlyCreated && $user->last_login->diffInSeconds($user->created_at) < 300);
                                    @endphp
                                    
                                    @if(!$isFirstLogin)
                                        <p>Last login: <span class="font-semibold text-blue-600">{{ $user->last_login->format('M d, Y \a\t g:i A') }}</span></p>
                                    @else
                                        <p><span class="text-gray-500 italic">First time logging in! Welcome aboard!</span></p>
                                    @endif
                                    <p>Account created: <span class="font-medium text-gray-700">{{ $user->created_at->format('M d, Y \a\t g:i A') }}</span></p>
                                    <p>Last updated: <span class="font-medium text-gray-700">{{ $user->updated_at->format('M d, Y \a\t g:i A') }}</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
        
        function showLastLogin() {
            const loginInfo = document.getElementById('last-login-info');
            if (loginInfo.classList.contains('hidden')) {
                loginInfo.classList.remove('hidden');
            } else {
                loginInfo.classList.add('hidden');
            }
        }
        
        // Check for auth success/error messages on page load
        document.addEventListener('DOMContentLoaded', function() {
            const urlParams = new URLSearchParams(window.location.search);
            const successParam = urlParams.get('auth_success');
            const errorParam = urlParams.get('auth_error');
            
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
        });
    </script>
</x-app-layout>