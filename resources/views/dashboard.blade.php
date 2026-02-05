<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight animate-pulse">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!-- Animated Blue Gradient Background -->
<div class="min-h-screen bg-white py-8 px-4 sm:px-6 lg:px-8 relative overflow-hidden">        <!-- Animated Background Elements -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute -top-40 -right-40 w-80 h-80 bg-white rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob"></div>
            <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-blue-300 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob animation-delay-2000"></div>
            <div class="absolute top-40 left-40 w-80 h-80 bg-blue-200 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob animation-delay-4000"></div>
        </div>
        
        <div class="max-w-none mx-0 w-full relative z-10">
            <!-- Welcome Card with Advanced Animations -->
            <div class="bg-white rounded-2xl shadow-2xl overflow-hidden mb-8 transform transition-all duration-500 hover:scale-[1.02] group">
                <div class="bg-gradient-to-r from-blue-600 to-indigo-700 px-6 sm:px-8 md:px-12 py-8 sm:py-10 text-white text-center relative overflow-hidden">
                    <!-- Animated Wave Background -->
                    <div class="absolute inset-0 opacity-10">
                        <div class="wave-animation"></div>
                    </div>
                    
                    <div class="flex justify-center mb-6 relative z-10">
                        <div class="bg-white/20 p-4 rounded-full backdrop-blur-sm border border-white/30 group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-user-astronaut text-4xl text-white animate-bounce"></i>
                        </div>
                    </div>
                    
                    <div class="relative z-10">
                        <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold mb-3 bg-clip-text text-transparent bg-gradient-to-r from-white to-blue-200">
                            Welcome, <span class="animate-pulse">{{ $user->name }}</span>!
                        </h1>
                        <p class="text-blue-100 text-lg sm:text-xl mb-4">You're successfully logged into your premium dashboard</p>
                        
                        <!-- Interactive Status Badge -->
                        <div class="inline-flex items-center px-4 py-2 bg-white/20 backdrop-blur-sm rounded-full border border-white/30 animate-pulse">
                            <div class="w-3 h-3 bg-green-400 rounded-full mr-2 animate-ping"></div>
                            <span class="text-white font-medium">Live Session Active</span>
                        </div>
                    </div>
                </div>
                
                <div class="p-6 sm:p-8 bg-gradient-to-br from-gray-50 to-white">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Enhanced User Info Card -->
                        <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl p-6 border border-blue-100 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                            <div class="flex items-center mb-4">
                                <div class="p-3 bg-blue-500 rounded-lg mr-3">
                                    <i class="fas fa-id-badge text-white text-xl"></i>
                                </div>
                                <h3 class="text-2xl font-bold text-gray-800">Your Profile</h3>
                            </div>
                            
                            <div class="space-y-4">
                                <div class="flex items-center justify-between p-3 bg-white rounded-lg border border-blue-100 hover:bg-blue-50 transition-colors duration-200">
                                    <div class="flex items-center">
                                        <i class="fas fa-user-circle text-blue-500 mr-3"></i>
                                        <span class="text-blue-600 font-medium">Username:</span>
                                    </div>
                                    <span class="text-gray-700 font-semibold">{{ $user->username }}</span>
                                </div>
                                
                                <div class="flex items-center justify-between p-3 bg-white rounded-lg border border-blue-100 hover:bg-blue-50 transition-colors duration-200">
                                    <div class="flex items-center">
                                        <i class="fas fa-signature text-blue-500 mr-3"></i>
                                        <span class="text-blue-600 font-medium">Name:</span>
                                    </div>
                                    <span class="text-gray-700 font-semibold">{{ $user->name }}</span>
                                </div>
                                
                                <div class="flex items-center justify-between p-3 bg-white rounded-lg border border-blue-100 hover:bg-blue-50 transition-colors duration-200">
                                    <div class="flex items-center">
                                        <i class="fas fa-envelope text-blue-500 mr-3"></i>
                                        <span class="text-blue-600 font-medium">Email:</span>
                                    </div>
                                    <span class="text-gray-700 font-semibold">{{ $user->email }}</span>
                                </div>
                                
                                <div class="flex items-center justify-between p-3 bg-white rounded-lg border border-blue-100 hover:bg-blue-50 transition-colors duration-200">
                                    <div class="flex items-center">
                                        <i class="fas fa-power-off text-blue-500 mr-3"></i>
                                        <span class="text-blue-600 font-medium">Status:</span>
                                    </div>
                                    <span class="px-3 py-1 rounded-full text-sm font-bold 
                                        {{ $user->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $user->is_active ? '● Active' : '● Inactive' }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Enhanced Quick Actions Card -->
                        <div class="bg-white rounded-2xl p-6 border border-gray-200 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                            <div class="flex items-center mb-4">
                                <div class="p-3 bg-gradient-to-r from-purple-500 to-pink-500 rounded-lg mr-3">
                                    <i class="fas fa-bolt text-white text-xl"></i>
                                </div>
                                <h3 class="text-2xl font-bold text-gray-800">Quick Actions</h3>
                            </div>
                            
                            <div class="space-y-4">
                                <a href="{{ route('profile.edit') }}" 
                                   class="block w-full text-center bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-blue-600 hover:to-indigo-700 text-white font-bold py-4 px-6 rounded-xl transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg group">
                                    <i class="fas fa-user-edit mr-3 group-hover:rotate-12 transition-transform duration-300"></i>
                                    Edit Profile
                                </a>
                                
                                <button onclick="showLastLogin()" 
                                        class="block w-full text-center bg-gradient-to-r from-gray-100 to-gray-200 hover:from-gray-200 hover:to-gray-300 text-gray-700 font-bold py-4 px-6 rounded-xl border border-gray-300 transition-all duration-300 transform hover:-translate-y-1 hover:shadow-md group">
                                    <i class="fas fa-history mr-3 group-hover:rotate-12 transition-transform duration-300"></i>
                                    Show Last Login
                                </button>
                            </div>
                            
                            <div id="last-login-info" class="mt-6 p-4 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl border border-blue-200 hidden transition-all duration-500 transform scale-95 opacity-0">
                                <div class="flex items-start">
                                    <i class="fas fa-info-circle text-blue-500 mt-1 mr-3"></i>
                                    <div>
                                        <p class="text-blue-800 font-semibold mb-1">Login History</p>
                                        <p class="text-sm text-gray-600">
                                            @if($user->last_login)
                                                Last login: <span class="font-bold text-blue-600">{{ $user->last_login->format('M d, Y \a\t g:i A') }}</span>
                                            @else
                                                <span class="text-gray-500 italic">First time logging in! Welcome aboard!</span>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Enhanced Stats Cards Section -->
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6 px-4 sm:px-6 lg:px-8">
                <!-- Total Users Card -->
                <div class="bg-white rounded-2xl p-6 shadow-xl border border-gray-100 transform transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl group relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-500/10 to-indigo-500/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="relative z-10 text-center">
                        <div class="inline-flex items-center justify-center w-20 h-20 rounded-2xl bg-gradient-to-br from-blue-500 to-indigo-600 mb-4 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            <i class="fas fa-users text-3xl text-white"></i>
                        </div>
                        <h3 class="text-3xl font-bold text-gray-800 mb-2">100+</h3>
                        <p class="text-gray-600 font-bold text-lg mb-1">Total Users</p>
                        <p class="text-sm text-gray-500">In our system</p>
                        <div class="mt-3 w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-gradient-to-r from-blue-500 to-indigo-600 h-2 rounded-full w-full animate-pulse"></div>
                        </div>
                    </div>
                </div>

                <!-- Security Status Card -->
                <div class="bg-white rounded-2xl p-6 shadow-xl border border-gray-100 transform transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl group relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-br from-green-500/10 to-emerald-500/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="relative z-10 text-center">
                        <div class="inline-flex items-center justify-center w-20 h-20 rounded-2xl bg-gradient-to-br from-green-500 to-emerald-600 mb-4 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            <i class="fas fa-shield-alt text-3xl text-white"></i>
                        </div>
                        <h3 class="text-3xl font-bold text-gray-800 mb-2 text-green-600">Secure</h3>
                        <p class="text-gray-600 font-bold text-lg mb-1">Security Status</p>
                        <p class="text-sm text-gray-500">End-to-end encrypted</p>
                        <div class="mt-3 flex justify-center space-x-1">
                            <div class="w-3 h-3 bg-green-500 rounded-full animate-bounce"></div>
                            <div class="w-3 h-3 bg-green-500 rounded-full animate-bounce animation-delay-200"></div>
                            <div class="w-3 h-3 bg-green-500 rounded-full animate-bounce animation-delay-400"></div>
                        </div>
                    </div>
                </div>

                <!-- System Status Card -->
                <div class="bg-white rounded-2xl p-6 shadow-xl border border-gray-100 transform transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl group relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-br from-purple-500/10 to-pink-500/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="relative z-10 text-center">
                        <div class="inline-flex items-center justify-center w-20 h-20 rounded-2xl bg-gradient-to-br from-purple-500 to-pink-600 mb-4 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            <i class="fas fa-sync-alt text-3xl text-white animate-spin"></i>
                        </div>
                        <h3 class="text-3xl font-bold text-gray-800 mb-2 text-purple-600">Live</h3>
                        <p class="text-gray-600 font-bold text-lg mb-1">System Status</p>
                        <p class="text-sm text-gray-500">Real-time monitoring</p>
                        <div class="mt-3 flex items-center justify-center text-xs text-purple-600 font-bold">
                            <div class="w-2 h-2 bg-purple-500 rounded-full mr-2 animate-ping"></div>
                            ONLINE
                        </div>
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
                setTimeout(() => {
                    loginInfo.classList.remove('scale-95', 'opacity-0');
                    loginInfo.classList.add('scale-100', 'opacity-100');
                }, 10);
            } else {
                loginInfo.classList.add('scale-95', 'opacity-0');
                loginInfo.classList.remove('scale-100', 'opacity-100');
                setTimeout(() => {
                    loginInfo.classList.add('hidden');
                }, 300);
            }
        }
        
        // Add animation delays
        document.addEventListener('DOMContentLoaded', function() {
            const style = document.createElement('style');
            style.textContent = `
                @keyframes blob {
                    0% { transform: translate(0px, 0px) scale(1); }
                    33% { transform: translate(30px, -50px) scale(1.1); }
                    66% { transform: translate(-20px, 20px) scale(0.9); }
                    100% { transform: translate(0px, 0px) scale(1); }
                }
                
                @keyframes wave {
                    0% { transform: rotate(0deg); }
                    100% { transform: rotate(360deg); }
                }
                
                .animate-blob {
                    animation: blob 7s infinite;
                }
                
                .animation-delay-2000 {
                    animation-delay: 2s;
                }
                
                .animation-delay-4000 {
                    animation-delay: 4s;
                }
                
                .wave-animation {
                    width: 200%;
                    height: 200%;
                    background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
                    animation: wave 20s linear infinite;
                }
                
                .animation-delay-200 {
                    animation-delay: 0.2s;
                }
                
                .animation-delay-400 {
                    animation-delay: 0.4s;
                }
            `;
            document.head.appendChild(style);
        });
    </script>
</x-app-layout>
