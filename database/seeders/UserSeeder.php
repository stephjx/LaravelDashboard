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
        User::factory()->create([
            'username' => 'admin',
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'is_active' => true,
            'last_login' => null,
            'email_verified_at' => $adminRegistrationDate->copy()->addDays(rand(1, 5)),
            'created_at' => $adminRegistrationDate,
            'updated_at' => $adminRegistrationDate,
        ]);

        // Create 99 additional users
        User::factory(99)->create();
    }
}
