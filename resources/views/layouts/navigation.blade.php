<nav x-data="{ open: false }" class="bg-gradient-to-r from-blue-600 to-blue-800 border-b border-blue-700 shadow-lg" style="background: linear-gradient(to right, #2563eb, #1d4ed8);">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="text-white text-xl font-bold flex items-center">
                        <i class="fas fa-chart-line mr-2"></i>
                        Dashboard
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" 
                               class="text-blue-100 hover:text-white border-b-2 border-transparent hover:border-white transition duration-200">
                        <i class="fas fa-home mr-2"></i>{{ __('Dashboard') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-4 font-medium rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none transition ease-in-out duration-150 shadow-md">
                            <div class="mr-2">{{ Auth::user()->name }}</div>
                            <div>
                                <i class="fas fa-chevron-down text-xs"></i>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="hover:bg-blue-50">
                            <i class="fas fa-user mr-2 text-blue-600"></i>{{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();" 
                                    class="hover:bg-red-50 text-red-600 hover:text-red-700">
                                <i class="fas fa-sign-out-alt mr-2"></i>{{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-blue-200 hover:text-white hover:bg-blue-600 focus:outline-none focus:bg-blue-600 transition duration-150 ease-in-out">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-blue-800">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" 
                                  class="text-blue-100 hover:text-white hover:bg-blue-700 border-l-4 border-transparent hover:border-white pl-4 py-3">
                <i class="fas fa-home mr-3"></i>{{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-blue-700">
            <div class="px-4 py-3 bg-blue-700">
                <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-blue-200">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="text-blue-100 hover:text-white hover:bg-blue-700 pl-4 py-3">
                    <i class="fas fa-user mr-3"></i>{{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();" 
                            class="text-red-300 hover:text-red-100 hover:bg-red-700 pl-4 py-3">
                        <i class="fas fa-sign-out-alt mr-3"></i>{{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
