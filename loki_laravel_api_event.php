<?php 
//---------------------------------------------------
//---------------------------------------------------
// Exemple d'étapes pour commencer
//---------------------------------------------------
//---------------------------------------------------
/*
Nous avons mis à jour l'installateur laravel (5.14.0)
Etapes pour loki_laravel_api_event
- nouvelle installation laravel en choississant le starter kit "none"
laravel new loki_laravel_api_event

- suivre les étapes avec notamment le choix de blade
- après avoir choisi le SGBD (mysql), aller dans le fichier .env pour rajouter ces lignes (au cas où c'est nécessaire) :
DB_CHARSET=utf8
DB_COLLATION=utf8_general_ci

- On install breeze
cd .\loki_laravel_api_event\
composer require laravel/breeze --dev
composer require laravel/breeze --dev

- une fois l'installation terminée : npm install puis npm run dev et on change de console
- ensuite php artisan serve et on change de console

- Si vous faites le choix d'utiliser Spatie :
composer require spatie/laravel-permission
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"

- aller dans le dernier fichier de migration (database/migrations/) et changer ces deux éléments (si nécessaire, toujours lié au souci de taille des string selon la version de MySQL) : Sur les deux création des tables roles et permissions

$table->string('name');
$table->string('guard_name');

On change par 

$table->string('name', 225);
$table->string('guard_name', 25);

- php artisan migrate

- Ensuite il faut aller dans le model User Pour rajouter le trait HasRole

use Spatie\Permission\Traits\HasRoles; // à rajouter

class User extends Authenticatable
{
    use HasRoles; // à rajouter
    //...
}

// on crée un seeder pour créer des roles, puis on midfie DatabaseSeeder pour créer 2 comptes
php artisan make:seeder RoleSeeder

// On va dans le fichier database/seeders/RoleSeeder.php et on déclare des rôles, permissions ...
// On va dans le fichier database/seeders/DatabaseSeeder.php et on crée des utilisateur (admin et user1)

// On execute :
php artisan migrate:fresh --seed


*/