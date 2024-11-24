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
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'covernewsupate@gmail.com',
            'password' => Hash::make('Pass3132@'),
            // 'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        // User::create([
        //     'name' => 'Author User',
        //     'email' => 'author@gmail.com',
        //     'password' => bcrypt('password'),
        //     // 'role' => 'author',
        //     'email_verified_at' => now(),
        // ]);

        // User::create([
        //     'name' => 'Reader User',
        //     'email' => 'reader@example.com',
        //     'password' => bcrypt('password'),
        //     // 'role' => 'reader',
        //     'email_verified_at' => now(),
        // ]);
    }
}
