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
            'name'      => 'Organisateur',
            'email'     => 'organisateur@mail.fr',
            'password'  => Hash::make('password'),
        ]);
        $developpeur->assignRole('organisateur');

        $client = User::create([
            'name'      => 'Utilisateur',
            'email'     => 'utilisateur@mail.fr',
            'password'  => Hash::make('password'),
        ]);
        $client->assignRole('utilisateur');
    }
}

# php artisan migrate:fresh --seed