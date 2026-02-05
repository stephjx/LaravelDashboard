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
        
        // Force fresh data from database to see actual timestamps
        $user->refresh();
        
        // Only update last_login if this is the user's first visit to dashboard after login
        // or if last_login is null (first-time user)
        $lastLogin = $user->last_login;
        if (!$lastLogin || (is_object($lastLogin) && $lastLogin->diffInMinutes(now()) > 30)) {
            $user->update(['last_login' => now()]);
            // Refresh again to get the updated timestamp
            $user->refresh();
        }
        
        // Get actual user count
        $userCount = \App\Models\User::count();
        
        // Get additional stats
        $activeUsers = \App\Models\User::where('is_active', true)->count();
        $recentLogins = \App\Models\User::where('last_login', '>=', now()->subDays(7))->count();
        
        return view('dashboard', compact('user', 'userCount', 'activeUsers', 'recentLogins'));
    }
}
