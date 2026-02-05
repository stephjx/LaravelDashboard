<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        \Log::info('Registration attempt started');
        \Log::info('Request data: ' . json_encode($request->all()));
        
        try {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);
            \Log::info('Validation passed');

            $user = User::create([
                'username' => $this->generateUsername($request->name),
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'is_active' => true,
                'last_login' => now(), // Set last_login to current time for new registration
                'email_verified_at' => fake()->boolean(80) ? now() : null, // 80% chance of immediate verification
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            \Log::info('User created: ' . $user->id);

            event(new Registered($user));

            Auth::login($user);
            \Log::info('User logged in');

            // Update last_login timestamp after successful login
            $user->update(['last_login' => now()]);

            \Log::info('Registration successful - redirecting with success parameter');

            return redirect(route('dashboard', absolute: false) . '?auth_success=' . urlencode('Registration successful! Welcome aboard!'));
        } catch (\Exception $e) {
            \Log::error('Registration failed: ' . $e->getMessage());
            \Log::error('Stack trace: ' . $e->getTraceAsString());
            throw $e;
        }
    }

    /**
     * Generate a unique username from the user's name.
     *
     * @param string $name
     * @return string
     */
    private function generateUsername(string $name): string
    {
        // Convert name to lowercase and remove spaces
        $username = strtolower(str_replace(' ', '', $name));
        
        // Ensure username is unique
        $originalUsername = $username;
        $counter = 1;
        
        while (User::where('username', $username)->exists()) {
            $username = $originalUsername . $counter;
            $counter++;
        }
        
        return $username;
    }
}
