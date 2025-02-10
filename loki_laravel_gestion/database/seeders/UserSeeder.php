<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin user',
            'email' => 'admin@mail.fr',
            'password' => Hash::make('Password@123'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Developpeur user',
            'email' => 'developpeur@mail.fr',
            'password' => Hash::make('Password@123'),
            'role' => 'developpeur',
        ]);

        User::create([
            'name' => 'Client user',
            'email' => 'client@mail.fr',
            'password' => Hash::make('Password@123'),
            'role' => 'client',
        ]);
    }
}
