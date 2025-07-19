<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'User',
            'email' => 'user@example.com',
            'nik' => '12345678',
            'role' => 'user',
            'password' => Hash::make('12345678'),
        ]);
    }
}
