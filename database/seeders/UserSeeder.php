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
        //Create Super Admin
        User::create([
            'name' => 'Super Admin',
            'email' => 'exampel@superadmin.com',
            'password' => Hash::make('exampel@superadmin.com'),
            'type' => 'super_admin',
            'is_delete'=>false,
        ]);

        //Create Admin
        User::create([
            'name' => 'Admin',
            'email' => 'example@admin.com',
            'password' => Hash::make('example@admin.com'),
            'type' => 'admin',
            'is_delete'=>true,
        ]);

        //Create Teacher
        User::create([
            'name' => 'Teacher',
            'email' => 'example@teacher.com',
            'password' => Hash::make('example@teacher.com'),
            'type' => 'admin',
            'is_delete'=>true,
        ]);

        //Create Teacher
        User::create([
            'name' => 'Official',
            'email' => 'example@official.com',
            'password' => Hash::make('example@official.com'),
            'type' => 'admin',
            'is_delete'=>true,
        ]);
    }
}
