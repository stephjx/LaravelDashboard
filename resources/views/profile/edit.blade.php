<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Profile Settings') }}
        </h2>
    </x-slot>

    <div class="min-h-screen bg-white py-8 px-4 sm:px-6 lg:px-8 relative overflow-hidden hide-scrollbar">
        <div class="max-w-7xl mx-auto">
            <!-- Professional Welcome Section -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 mb-8">
                <div class="p-6 sm:p-8">
                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
                        <div class="flex items-center">
                            <div class="p-3 bg-blue-100 rounded-lg mr-4">
                                <i class="fas fa-user-edit text-blue-600 text-2xl"></i>
                            </div>
                            <div>
                                <h1 class="text-2xl sm:text-3xl font-bold text-gray-900">Edit Profile</h1>
                                <p class="text-gray-600 mt-1">Manage your account information and settings</p>
                            </div>
                        </div>
                        <div class="flex items-center justify-center lg:justify-end">
                            <div class="flex items-center px-3 py-2 bg-green-50 rounded-full">
                                <div class="w-2 h-2 bg-green-500 rounded-full mr-2"></div>
                                <span class="text-sm font-medium text-green-700">Editing Mode</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Profile Forms Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Profile Information Card -->
                <div class="bg-white rounded-xl p-6 border border-gray-200 shadow-sm group">
                    <div class="flex items-center mb-6">
                        <div class="p-3 bg-blue-100 rounded-lg mr-3">
                            <i class="fas fa-user-circle text-blue-600 text-xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Profile Information</h3>
                    </div>
                    <div class="prose max-w-none">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <!-- Password & Security Card -->
                <div class="space-y-8">
                    <!-- Password Update Card -->
                    <div class="bg-white rounded-xl p-6 border border-gray-200 shadow-sm group">
                        <div class="flex items-center mb-6">
                            <div class="p-3 bg-green-100 rounded-lg mr-3">
                                <i class="fas fa-lock text-green-600 text-xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900">Update Password</h3>
                        </div>
                        <div class="prose max-w-none">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>

                    <!-- Delete Account Card -->
                    <div class="bg-white rounded-xl p-6 border border-gray-200 shadow-sm group">
                        <div class="flex items-center mb-6">
                            <div class="p-3 bg-red-100 rounded-lg mr-3">
                                <i class="fas fa-trash-alt text-red-600 text-xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900">Delete Account</h3>
                        </div>
                        <div class="prose max-w-none">
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>