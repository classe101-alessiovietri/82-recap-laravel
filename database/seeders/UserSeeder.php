<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models
use App\Models\User;

// Helpers
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Alessio',
                'email' => 'alessio@boolean.careers',
                'password' => 'password'
            ],
            [
                'name' => 'Michela',
                'email' => 'michela@boolean.careers',
                'password' => 'password'
            ],
        ];

        User::truncate();

        foreach ($users as $user) {
            User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => Hash::make($user['password']),
            ]);
        }
    }
}
