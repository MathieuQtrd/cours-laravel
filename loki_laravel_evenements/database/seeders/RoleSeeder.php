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
        // Création des roles
        $admin = Role::create(['name' => 'admin']);
        $organisateur = Role::create(['name' => 'organisateur']);
        $utilisateur = Role::create(['name' => 'utilisateur']);

        // Création de permissions
        Permission::create(['name' => 'creer_evenement']);
        Permission::create(['name' => 'creer_role']);
        Permission::create(['name' => 'creer_permission']);
        Permission::create(['name' => 'gerer_evenements']);
        Permission::create(['name' => 'gerer_roles']);
        Permission::create(['name' => 'gerer_permissions']);
        Permission::create(['name' => 'gerer_utilisateurs']);

        // On assigne des permissions aux roles
        $admin->givePermissionTo(['creer_evenement', 'creer_role', 'creer_permission', 'gerer_evenements', 'gerer_utilisateurs', 'gerer_roles', 'gerer_permissions',]);
        $organisateur->givePermissionTo(['creer_evenement']);
    }
}
