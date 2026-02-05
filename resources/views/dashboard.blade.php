<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <div class="card border-primary">
                                <div class="card-header bg-primary text-white">
                                    <h3 class="card-title mb-0">
                                        <i class="fas fa-user-circle me-2"></i>
                                        Welcome, {{ $user->name }}!
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5 class="text-primary">User Information</h5>
                                            <table class="table table-borderless">
                                                <tr>
                                                    <td><strong>Username:</strong></td>
                                                    <td>{{ $user->username }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Name:</strong></td>
                                                    <td>{{ $user->name }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Email:</strong></td>
                                                    <td>{{ $user->email }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Status:</strong></td>
                                                    <td>
                                                        @if($user->is_active)
                                                            <span class="badge bg-success">Active</span>
                                                        @else
                                                            <span class="badge bg-danger">Inactive</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Last Login:</strong></td>
                                                    <td>
                                                        @if($user->last_login)
                                                            {{ $user->last_login->format('M d, Y H:i:s') }}
                                                        @else
                                                            <span class="text-muted">Never logged in</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-md-6">
                                            <h5 class="text-primary">Account Statistics</h5>
                                            <div class="alert alert-info">
                                                <h6 class="alert-heading">Quick Stats</h6>
                                                <p class="mb-0">This is your personalized dashboard where you can manage your account and view your information.</p>
                                            </div>
                                            
                                            <div class="d-grid gap-2 mt-3">
                                                <a href="{{ route('profile.edit') }}" class="btn btn-outline-primary">
                                                    <i class="fas fa-user-edit me-2"></i>Edit Profile
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="card border-secondary">
                                <div class="card-header bg-secondary text-white">
                                    <h4 class="card-title mb-0">
                                        <i class="fas fa-tachometer-alt me-2"></i>
                                        System Overview
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div class="row text-center">
                                        <div class="col-md-4 mb-3">
                                            <div class="border rounded p-3 bg-light">
                                                <i class="fas fa-users fa-2x text-primary mb-2"></i>
                                                <h5>Total Users</h5>
                                                <p class="display-6 text-primary">100</p>
                                                <small class="text-muted">Generated by seeder</small>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div class="border rounded p-3 bg-light">
                                                <i class="fas fa-shield-alt fa-2x text-success mb-2"></i>
                                                <h5>Security Status</h5>
                                                <p class="display-6 text-success">Secure</p>
                                                <small class="text-muted">Authentication Active</small>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div class="border rounded p-3 bg-light">
                                                <i class="fas fa-sync-alt fa-2x text-info mb-2"></i>
                                                <h5>Last Updated</h5>
                                                <p class="display-6 text-info">Just Now</p>
                                                <small class="text-muted">Real-time Data</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
