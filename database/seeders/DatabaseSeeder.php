<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create an Admin user
        User::updateOrCreate(
            ['email' => 'admin@rodokan.com'],
            [
                'name' => 'Admin RODOKAN',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]
        );

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
