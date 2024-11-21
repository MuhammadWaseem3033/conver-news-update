<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Author User',
            'email' => 'author@example.com',
            'password' => bcrypt('password'),
            'role' => 'author',
        ]);

        User::create([
            'name' => 'Reader User',
            'email' => 'reader@example.com',
            'password' => bcrypt('password'),
            'role' => 'reader',
        ]);
    }
}
