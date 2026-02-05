<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        \Log::info('Login attempt started');
        \Log::info('Request data: ' . json_encode($request->all()));
        
        try {
            $request->authenticate();
            \Log::info('Authentication successful');

            $request->session()->regenerate();
            \Log::info('Session regenerated');

            \Log::info('Login successful - redirecting with success parameter');

            return redirect()->intended(route('dashboard', absolute: false) . '?auth_success=' . urlencode('Login successful! Welcome back!'));
        } catch (\Exception $e) {
            \Log::error('Login failed: ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/?auth_success=' . urlencode('You have been logged out successfully!'));
    }
}
