<nav x-data="{ open: false }" class="bg-gradient-to-r from-blue-500 to-blue-600 border-b border-blue-600 shadow-md sticky top-0 z-50">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <!-- Logo -->
                <div class="shrink-0 flex items-center mr-8">
                    <a href="{{ route('dashboard') }}" class="text-white text-xl font-bold flex items-center group">
                        <i class="fas fa-chart-bar mr-3 text-white"></i>
                        <span class="text-white font-bold">Dashboard</span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-1 sm:-my-px sm:ms-10 sm:flex">
                    <!-- Profile button removed as requested -->
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-4 py-2 border border-white/20 text-sm leading-4 font-semibold rounded-lg text-white bg-white/10 hover:bg-white/20 focus:outline-none transition-colors duration-200 shadow-sm">
                            <div class="mr-3 flex items-center">
                                <div class="w-8 h-8 rounded-full bg-white/20 flex items-center justify-center mr-2">
                                    <i class="fas fa-user text-white text-sm"></i>
                                </div>
                                <span class="font-semibold">{{ Auth::user()->name }}</span>
                            </div>
                            <div>
                                <i class="fas fa-chevron-down text-xs ml-1 text-white"></i>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="px-4 py-3 bg-gradient-to-r from-blue-50 to-indigo-50 border-b border-gray-200">
                            <p class="text-sm text-gray-900 font-semibold">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-gray-600">{{ Auth::user()->email }}</p>
                        </div>
                        
                        <x-dropdown-link :href="route('profile.edit')" class="hover:bg-blue-50 transition-colors duration-200 flex items-center text-gray-700">
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
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-blue-100 hover:text-white hover:bg-white/10 focus:outline-none focus:bg-white/10 transition-colors duration-200">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-gradient-to-b from-blue-600 to-blue-700 border-t border-blue-600">
        <div class="pt-2 pb-3 space-y-1">
            <!-- Profile button removed from mobile navigation as requested -->
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-blue-500">
            <div class="px-4 py-3 bg-blue-600/50">
                <div class="font-semibold text-white">{{ Auth::user()->name }}</div>
                <div class="text-sm text-blue-100">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="text-blue-100 hover:text-white hover:bg-white/10 pl-4 py-3 transition-all duration-200 flex items-center">
                    <i class="fas fa-user-cog mr-3"></i>{{ __('Profile Settings') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();" 
                            class="text-red-200 hover:text-red-100 hover:bg-red-700/30 pl-4 py-3 transition-all duration-200 flex items-center">
                        <i class="fas fa-sign-out-alt mr-3"></i>{{ __('Sign Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
