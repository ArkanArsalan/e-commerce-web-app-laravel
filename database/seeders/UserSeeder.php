<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        User::factory()->create([
            'name' => 'user',
            'email' => 'user@example.com',
            'password' => 'user123',
            'role' => 'user'
        ]);

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => 'admin123',
            'role' => 'admin'
        ]);
    }
}
