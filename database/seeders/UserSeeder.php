<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Admin (fixed)
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'role' => 'admin'
        ]);

        // User (loop)
        for ($i = 1; $i <= 4; $i++) {
            User::create([
                'name' => "User $i",
                'email' => "user$i@gmail.com",
                'password' => bcrypt('user123'),
                'role' => 'user'
            ]);
        }
    }
}
