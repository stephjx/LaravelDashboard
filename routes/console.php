<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Models\User;
use Illuminate\Support\Carbon;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('export-users', function () {
    $users = User::select('id', 'username', 'name', 'email', 'is_active', 'created_at')
                 ->orderBy('id')
                 ->get();
    
    $this->info("=== USER DOCUMENTATION EXPORT ===");
    $this->info("Total Users: " . $users->count());
    $this->info("");
    
    $this->info("KNOWN TEST USER:");
    $this->info("Email: admin@example.com");
    $this->info("Password: password");
    $this->info("");
    
    $this->info("ALL USERS LIST:");
    $this->info(str_repeat('-', 80));
    
    foreach ($users as $user) {
        $this->info("ID: {$user->id}");
        $this->info("Username: {$user->username}");
        $this->info("Name: {$user->name}");
        $this->info("Email: {$user->email}");
        $this->info("Active: " . ($user->is_active ? 'Yes' : 'No'));
        $this->info("Created: {$user->created_at}");
        $this->info(str_repeat('-', 40));
    }
    
    $this->info("\nNOTE: All users use 'password' as their password");
})->purpose('Export all users information for documentation');

Artisan::command('export-users-csv', function () {
    $users = User::select('id', 'username', 'name', 'email', 'is_active', 'created_at')
                 ->orderBy('id')
                 ->get();
    
    $filename = 'users_export_' . date('Y-m-d_H-i-s') . '.csv';
    $filepath = storage_path('app/' . $filename);
    
    $file = fopen($filepath, 'w');
    
    // Add CSV headers
    fputcsv($file, ['ID', 'Username', 'Name', 'Email', 'Active', 'Password', 'Created At']);
    
    // Add known test user row
    fputcsv($file, [0, 'admin', 'Admin User', 'admin@example.com', 'Yes', 'password', now()]);
    
    // Add all generated users
    foreach ($users as $user) {
        fputcsv($file, [
            $user->id,
            $user->username,
            $user->name,
            $user->email,
            $user->is_active ? 'Yes' : 'No',
            'password',
            $user->created_at
        ]);
    }
    
    fclose($file);
    
    $this->info("=== CSV EXPORT COMPLETE ===");
    $this->info("File: " . $filename);
    $this->info("Path: " . $filepath);
    $this->info("Total Records: " . ($users->count() + 1));
    $this->info("");
    $this->info("CSV Headers: ID, Username, Name, Email, Active, Password, Created At");
    $this->info("All users have password: password");
})->purpose('Export all users to CSV file');

Artisan::command('check-users-count', function () {
    $count = \App\Models\User::count();
    $users = \App\Models\User::select('id', 'username', 'name', 'email')->orderBy('id')->get();
    
    $this->info("=== DATABASE USER COUNT ===");
    $this->info("Total users in database: " . $count);
    $this->info("");
    
    if ($count > 0) {
        $this->info("USER LIST:");
        $this->info(str_repeat('-', 60));
        foreach ($users as $user) {
            $this->info("ID: {$user->id} | Username: {$user->username} | Name: {$user->name} | Email: {$user->email}");
        }
        $this->info(str_repeat('-', 60));
    }
    
    $this->info("
This shows the actual database content.");
    $this->info("If this differs from your CSV export, you may need to re-seed the database.");
})->purpose('Check actual user count in database');

Artisan::command('show-user-timestamps', function () {
    $users = \App\Models\User::select('id', 'username', 'name', 'email', 'created_at', 'updated_at', 'last_login', 'email_verified_at')
              ->orderBy('created_at', 'desc')
              ->limit(10)
              ->get();
    
    $this->info("=== REALISTIC USER TIMESTAMPS ===");
    $this->info("Showing 10 most recent users with realistic timestamps:\n");
    
    foreach ($users as $user) {
        $this->info("ID: {$user->id} | Username: {$user->username}");
        $this->info("Name: {$user->name}");
        $this->info("Email: {$user->email}");
        $this->info("Created: " . $user->created_at->format('M d, Y H:i:s'));
        $this->info("Updated: " . $user->updated_at->format('M d, Y H:i:s'));
        $this->info("Verified: " . ($user->email_verified_at ? $user->email_verified_at->format('M d, Y H:i:s') : 'Not verified'));
        $this->info("Last Login: " . ($user->last_login ? Carbon::parse($user->last_login)->format('M d, Y H:i:s') : 'Never'));
        $this->info(str_repeat('-', 50));
    }
    
    $stats = \App\Models\User::selectRaw('COUNT(*) as total, COUNT(last_login) as with_login, COUNT(email_verified_at) as verified')
               ->first();
    
    $this->info("\n=== TIMESTAMP STATISTICS ===");
    $this->info("Total Users: " . $stats->total);
    $this->info("Users with login history: " . $stats->with_login);
    $this->info("Emails verified: " . $stats->verified);
    $this->info("\nAll timestamps now show realistic dates and times!");
})->purpose('Display users with realistic timestamps');
