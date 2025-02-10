<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class); // execute le seeder des roles

        $admin = User::create([
            'name'      => 'Admin',
            'email'     => 'admin@mail.fr',
            'password'  => Hash::make('password'),
        ]);
        $admin->assignRole('admin');

        $developpeur = User::create([
            'name'      => 'Developpeur',
            'email'     => 'developpeur@mail.fr',
            'password'  => Hash::make('password'),
        ]);
        $developpeur->assignRole('developpeur');

        $client = User::create([
            'name'      => 'Client',
            'email'     => 'client@mail.fr',
            'password'  => Hash::make('password'),
        ]);
        $client->assignRole('client');
    }
}

# php artisan migrate:fresh --seed