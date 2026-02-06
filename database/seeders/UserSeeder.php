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
     * Generates 110 users total:
     * - 10 specific test users with known credentials
     * - 1 admin user (admin@example.com)
     * - 99 additional random users
     */
    public function run(): void
    {
        // Create 10 specific test users with known credentials
        $testUsers = [
            [
                'username' => 'john_doe',
                'name' => 'John Doe',
                'email' => 'john.doe@example.com',
            ],
            [
                'username' => 'jane_smith',
                'name' => 'Jane Smith',
                'email' => 'jane.smith@example.com',
            ],
            [
                'username' => 'mike_wilson',
                'name' => 'Mike Wilson',
                'email' => 'mike.wilson@example.com',
            ],
            [
                'username' => 'sarah_johnson',
                'name' => 'Sarah Johnson',
                'email' => 'sarah.johnson@example.com',
            ],
            [
                'username' => 'david_brown',
                'name' => 'David Brown',
                'email' => 'david.brown@example.com',
            ],
            [
                'username' => 'lisa_davis',
                'name' => 'Lisa Davis',
                'email' => 'lisa.davis@example.com',
            ],
            [
                'username' => 'robert_miller',
                'name' => 'Robert Miller',
                'email' => 'robert.miller@example.com',
            ],
            [
                'username' => 'emily_garcia',
                'name' => 'Emily Garcia',
                'email' => 'emily.garcia@example.com',
            ],
            [
                'username' => 'james_rodriguez',
                'name' => 'James Rodriguez',
                'email' => 'james.rodriguez@example.com',
            ],
            [
                'username' => 'mary_martinez',
                'name' => 'Mary Martinez',
                'email' => 'mary.martinez@example.com',
            ],
        ];

        // Create test users with known credentials
        foreach ($testUsers as $userData) {
            $registrationDate = now()->subMonths(rand(1, 12));
            $lastLogin = fake()->boolean(70) ? 
                fake()->dateTimeBetween($registrationDate->copy()->addDays(7)->format('Y-m-d H:i:s'), 'now') : 
                null;
            
            User::factory()->create([
                'username' => $userData['username'],
                'name' => $userData['name'],
                'email' => $userData['email'],
                'password' => Hash::make('password'),
                'is_active' => fake()->boolean(90),
                'last_login' => $lastLogin,
                'email_verified_at' => $registrationDate->copy()->addDays(rand(1, 5)),
                'created_at' => $registrationDate,
                'updated_at' => $registrationDate->copy()->addDays(rand(10, 90)),
            ]);
        }

        // Create admin user
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

        // Create 99 additional random users
        User::factory(99)->create();
    }
}
