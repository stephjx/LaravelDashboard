<nav x-data="{ open: false }" class="bg-gradient-to-r from-blue-600 to-indigo-700 border-b border-blue-700 shadow-xl sticky top-0 z-50 backdrop-blur-sm" style="background: linear-gradient(90deg, #2563eb, #4f46e5);">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0 overflow-hidden opacity-20">
        <div class="absolute top-0 left-1/4 w-64 h-64 bg-white rounded-full mix-blend-overlay filter blur-3xl animate-pulse"></div>
        <div class="absolute bottom-0 right-1/4 w-64 h-64 bg-blue-300 rounded-full mix-blend-overlay filter blur-3xl animate-pulse animation-delay-1000"></div>
    </div>
    
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <!-- Logo -->
                <div class="shrink-0 flex items-center mr-8">
                    <a href="{{ route('dashboard') }}" class="text-white text-2xl font-bold flex items-center group">
                        <i class="fas fa-chart-network mr-3 text-yellow-300 group-hover:rotate-12 transition-transform duration-300"></i>
                        <span class="text-white font-bold drop-shadow-lg">Dashboard Pro</span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-1 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" 
                               class="text-blue-100 hover:text-white border-b-2 border-transparent hover:border-white transition-all duration-300 px-4 py-2 rounded-lg hover:bg-white/10 backdrop-blur-sm">
                        <i class="fas fa-home mr-2"></i>{{ __('Dashboard') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-4 font-bold rounded-xl text-white bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-blue-600 hover:to-indigo-700 focus:outline-none transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                            <div class="mr-3 flex items-center">
                                <div class="w-8 h-8 rounded-full bg-white/20 flex items-center justify-center mr-2">
                                    <i class="fas fa-user text-white"></i>
                                </div>
                                <span class="font-bold">{{ Auth::user()->name }}</span>
                            </div>
                            <div>
                                <i class="fas fa-chevron-down text-xs transform transition-transform duration-300 group-hover:rotate-180"></i>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="px-4 py-3 bg-gradient-to-r from-blue-50 to-indigo-50 border-b border-gray-200">
                            <p class="text-sm text-gray-800 font-semibold">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-gray-600">{{ Auth::user()->email }}</p>
                        </div>
                        
                        <x-dropdown-link :href="route('profile.edit')" class="hover:bg-blue-50 transition-colors duration-200 flex items-center">
                            <i class="fas fa-user-cog mr-3 text-blue-600"></i>{{ __('Profile Settings') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();" 
                                    class="hover:bg-red-50 text-red-600 hover:text-red-700 transition-colors duration-200 flex items-center">
                                <i class="fas fa-sign-out-alt mr-3"></i>{{ __('Sign Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-3 rounded-xl text-blue-200 hover:text-white hover:bg-white/20 focus:outline-none focus:bg-white/20 transition-all duration-300 backdrop-blur-sm border border-blue-400/30">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-gradient-to-b from-blue-700 to-indigo-800 backdrop-blur-sm border-t border-blue-600">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" 
                                  class="text-blue-100 hover:text-white hover:bg-white/10 border-l-4 border-transparent hover:border-white pl-4 py-4 transition-all duration-300 flex items-center">
                <i class="fas fa-home mr-3"></i>{{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-blue-600">
            <div class="px-4 py-4 bg-blue-600/50 backdrop-blur-sm">
                <div class="font-bold text-lg text-white">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-blue-200">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="text-blue-100 hover:text-white hover:bg-white/10 pl-4 py-4 transition-all duration-300 flex items-center">
                    <i class="fas fa-user-cog mr-3"></i>{{ __('Profile Settings') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();" 
                            class="text-red-300 hover:text-red-100 hover:bg-red-700/50 pl-4 py-4 transition-all duration-300 flex items-center">
                        <i class="fas fa-sign-out-alt mr-3"></i>{{ __('Sign Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
