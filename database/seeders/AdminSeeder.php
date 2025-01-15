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
            'name' => 'Admin Basri',
            'email' => 'basri@admin.com',
            'password' => Hash::make('admin123basri'),
            'role' => 'admin'
        ]);
    }
} 