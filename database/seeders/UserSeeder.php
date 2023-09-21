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
        $alessio = [
            'name' => 'Alessio',
            'email' => 'alessio@boolean.careers',
            'password' => 'password'
        ];

        User::truncate();

        User::create([
            'name' => $alessio['name'],
            'email' => $alessio['email'],
            'password' => Hash::make($alessio['password']),
        ]);
    }
}
