<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin Ali',
            'email' => 'ali@admin.com',
            'password' => Hash::make('admin123ali'),
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'Staff Sarah',
            'email' => 'sarah@staff.com',
            'password' => Hash::make('staff123sarah'),
            'role' => 'staff'
        ]);
    }
} 