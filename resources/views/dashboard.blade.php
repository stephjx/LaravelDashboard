<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!-- Blue Gradient Background -->
    <div class="min-h-screen bg-gradient-to-br from-blue-400 via-blue-500 to-blue-600 py-12 px-4 sm:px-6 lg:px-8" style="background: linear-gradient(to bottom right, #60a5fa, #3b82f6, #2563eb);">
        <div class="max-w-4xl mx-auto">
            <!-- Welcome Card -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden mb-8 transform transition-all hover:scale-[1.02] duration-300">
                <div class="bg-gradient-to-r from-blue-600 to-blue-800 px-8 py-10 text-white text-center">
                    <div class="flex justify-center mb-4">
                        <div class="bg-white/20 p-4 rounded-full">
                            <i class="fas fa-user-circle text-4xl"></i>
                        </div>
                    </div>
                    <h1 class="text-3xl font-bold mb-2">Welcome, {{ $user->name }}!</h1>
                    <p class="text-blue-100 text-lg">You're successfully logged into your dashboard</p>
                </div>
                
                <div class="p-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- User Info Card -->
                        <div class="bg-blue-50 rounded-xl p-6 border border-blue-100">
                            <h3 class="text-xl font-semibold text-blue-800 mb-4 flex items-center">
                                <i class="fas fa-address-card mr-3 text-blue-600"></i>
                                Your Profile
                            </h3>
                            <div class="space-y-3">
                                <div class="flex justify-between py-2 border-b border-blue-100">
                                    <span class="text-blue-600 font-medium">Username:</span>
                                    <span class="text-gray-700">{{ $user->username }}</span>
                                </div>
                                <div class="flex justify-between py-2 border-b border-blue-100">
                                    <span class="text-blue-600 font-medium">Name:</span>
                                    <span class="text-gray-700">{{ $user->name }}</span>
                                </div>
                                <div class="flex justify-between py-2 border-b border-blue-100">
                                    <span class="text-blue-600 font-medium">Email:</span>
                                    <span class="text-gray-700">{{ $user->email }}</span>
                                </div>
                                <div class="flex justify-between py-2">
                                    <span class="text-blue-600 font-medium">Status:</span>
                                    <span class="px-3 py-1 rounded-full text-sm font-medium 
                                        {{ $user->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $user->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Quick Actions Card -->
                        <div class="bg-white rounded-xl p-6 border border-gray-200 shadow-sm">
                            <h3 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                                <i class="fas fa-bolt mr-3 text-blue-600"></i>
                                Quick Actions
                            </h3>
                            <div class="space-y-3">
                                <a href="{{ route('profile.edit') }}" 
                                   class="block w-full text-center bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-4 rounded-lg transition duration-200 transform hover:-translate-y-0.5 hover:shadow-lg">
                                    <i class="fas fa-user-edit mr-2"></i>Edit Profile
                                </a>
                                
                                <button onclick="showLastLogin()" 
                                        class="block w-full text-center bg-white hover:bg-gray-50 text-gray-700 font-medium py-3 px-4 rounded-lg border border-gray-300 transition duration-200">
                                    <i class="fas fa-clock mr-2"></i>Show Last Login
                                </button>
                            </div>
                            
                            <div id="last-login-info" class="mt-4 p-4 bg-gray-50 rounded-lg hidden transition-all duration-300">
                                <p class="text-sm text-gray-600">
                                    <i class="fas fa-info-circle mr-2 text-blue-500"></i>
                                    @if($user->last_login)
                                        Last login: <span class="font-medium">{{ $user->last_login->format('M d, Y \a\t g:i A') }}</span>
                                    @else
                                        <span class="text-gray-500">First time logging in!</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Total Users -->
                <div class="bg-white rounded-xl p-6 shadow-lg border border-gray-100 transform transition-all hover:-translate-y-1 hover:shadow-xl duration-300">
                    <div class="text-center">
                        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-blue-100 mb-4">
                            <i class="fas fa-users text-2xl text-blue-600"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-1">100</h3>
                        <p class="text-gray-600 font-medium">Total Users</p>
                        <p class="text-sm text-gray-500 mt-1">In system</p>
                    </div>
                </div>

                <!-- Security Status -->
                <div class="bg-white rounded-xl p-6 shadow-lg border border-gray-100 transform transition-all hover:-translate-y-1 hover:shadow-xl duration-300">
                    <div class="text-center">
                        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-green-100 mb-4">
                            <i class="fas fa-shield-alt text-2xl text-green-600"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-1">Secure</h3>
                        <p class="text-gray-600 font-medium">Security Status</p>
                        <p class="text-sm text-gray-500 mt-1">Protected</p>
                    </div>
                </div>

                <!-- System Status -->
                <div class="bg-white rounded-xl p-6 shadow-lg border border-gray-100 transform transition-all hover:-translate-y-1 hover:shadow-xl duration-300">
                    <div class="text-center">
                        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-purple-100 mb-4">
                            <i class="fas fa-sync-alt text-2xl text-purple-600"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-1">Online</h3>
                        <p class="text-gray-600 font-medium">System Status</p>
                        <p class="text-sm text-gray-500 mt-1">Operational</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showLastLogin() {
            const loginInfo = document.getElementById('last-login-info');
            if (loginInfo.classList.contains('hidden')) {
                loginInfo.classList.remove('hidden');
                loginInfo.classList.add('block');
            } else {
                loginInfo.classList.add('hidden');
                loginInfo.classList.remove('block');
            }
        }
    </script>
</x-app-layout>
