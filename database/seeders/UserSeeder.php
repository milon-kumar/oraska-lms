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
        User::insert([
            'name' => 'Example Admin',
            'email' => 'example@admin.com',
            'password' => Hash::make('example@admin.com'),
            'type' => 'admin'
        ]);
        User::create([
            'name' => 'Example Student',
            'email' => 'example@student.com',
            'password' => Hash::make('example@student.com'),
            'type' => 'student',
        ]);
    }
}
