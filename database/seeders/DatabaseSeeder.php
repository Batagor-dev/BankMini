<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
   
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Teller',
            'email' => 'teller@example.com',
            'password' => Hash::make('teller123'),
            'role' => 'teller',
        ]);

        User::create([
            'name' => 'User',
            'email' => 'user@example.com',
            'password' => Hash::make('user123'),
            'role' => 'user',
        ]);
    }
}
