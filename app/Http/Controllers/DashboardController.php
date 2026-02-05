<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display the dashboard view.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();
        
        // Update last_login timestamp
        $user->update(['last_login' => now()]);
        
        // Get actual user count
        $userCount = \App\Models\User::count();
        
        // Get additional stats
        $activeUsers = \App\Models\User::where('is_active', true)->count();
        $recentLogins = \App\Models\User::where('last_login', '>=', now()->subDays(7))->count();
        
        return view('dashboard', compact('user', 'userCount', 'activeUsers', 'recentLogins'));
    }
}
