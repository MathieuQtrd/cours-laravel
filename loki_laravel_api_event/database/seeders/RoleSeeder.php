<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // création de rôles :
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);

        // création de permissions
        Permission::create(['name' => 'create event']);

        // On affecte une ou des permissions aux rôles
        $adminRole->givePermissionTo(Permission::all()); // l'admin a tous les droits
    }
}
