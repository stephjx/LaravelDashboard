<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Generates 100 users with realistic data.
     * Test credentials: admin@example.com / password
     */
    public function run(): void
    {
        // Create test user with known credentials
        $adminRegistrationDate = now()->subMonths(rand(3, 8));
        $adminLastLogin = fake()->boolean(80) ? 
            fake()->dateTimeBetween($adminRegistrationDate->copy()->addDays(7)->format('Y-m-d H:i:s'), 'now') : 
            null;
        
        User::factory()->create([
            'username' => 'admin',
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'is_active' => true,
            'last_login' => $adminLastLogin,
            'email_verified_at' => $adminRegistrationDate->copy()->addDays(rand(1, 5)),
            'created_at' => $adminRegistrationDate,
            'updated_at' => $adminRegistrationDate->copy()->addDays(rand(30, 60)),
        ]);

        // Create 99 additional users
        User::factory(99)->create();
    }
}
