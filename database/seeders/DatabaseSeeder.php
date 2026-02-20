<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(20)->create();

        /*
        // Using factory overriding with values
        User::factory()->create([
            'name' => 'Ram Munda',
            'email' => 'rmunda@example.com',
            'role' => 'admin', // Added
        ]);
        */

        // Best practice: mix manual + factory cleanly
        // Admin (manual, controlled)
        User::firstOrCreate(
            ['email' => 'rmunda@example.com'],
            [
                'name' => 'Ram Munda',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'active' => true,
                'is_super_admin' => true,
                'email_verified_at' => now(),
            ]
        );

        // Others (factory-driven)
        User::factory(10)->create([
            'role' => 'advocate',
            'active' => true
        ]);

    }
}
