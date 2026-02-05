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
        User::factory()->create([
            'username' => 'admin',
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'is_active' => true,
            'last_login' => null,
        ]);

        // Create 99 additional users
        User::factory(99)->create();
    }
}
