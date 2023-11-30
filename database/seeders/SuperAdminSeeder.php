<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creating Super Admin User
        $superAdmin = User::create([
            'name' => 'Finfect', 
            'email' => 'superadmin@finfect.biz',
            'password' => Hash::make('finfect')
        ]);
        $superAdmin->assignRole('Super Admin');

        // Creating Admin User
        $admin = User::create([
            'name' => 'Sahil', 
            'email' => 'sahil@finfect.biz',
            'password' => Hash::make('finfect')
        ]);
        $admin->assignRole('Admin');

        // Creating Maker User
        $productManager = User::create([
            'name' => 'Vikas', 
            'email' => 'vikas@finfect.biz',
            'password' => Hash::make('finfect')
        ]);
        $productManager->assignRole('Maker'); 
    }
}