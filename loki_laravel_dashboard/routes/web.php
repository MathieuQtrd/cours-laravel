<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// role
Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'role:admin'])->name('admin.dashboard');

Route::get('/developpeur', function () {
    return view('developpeur.dashboard');
})->middleware(['auth', 'role:developpeur'])->name('developpeur.dashboard');

Route::get('/client', function () {
    return view('client.dashboard');
})->middleware(['auth', 'role:client'])->name('client.dashboard');

// permission
Route::get('/create_project', function () {
    return view('admin.projects.index');
})->middleware(['auth', 'permission:creer_projet'])->name('admin.projects.index');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::put('/admin/users/{id}/role', [UserController::class, 'updateRole'])->name('admin.users.updateRole');
    Route::delete('/admin/users/{id}', [UserController::class, 'destroy'])->name('admin.users.delete');

    // création utilisateur
    Route::get('/admin/users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('/admin/users', [UserController::class, 'store'])->name('admin.users.store');

    // roles
    Route::get('/admin/roles', [RoleController::class, 'index'])->name('admin.roles.index');
    Route::get('/admin/roles/create', [RoleController::class, 'create'])->name('admin.roles.create');
    Route::post('/admin/roles', [RoleController::class, 'store'])->name('admin.roles.store');
    Route::get('/admin/roles/{role}', [RoleController::class, 'show'])->name('admin.roles.show');
    Route::put('/admin/roles/permissions/{role}', [RoleController::class, 'updatePermissions'])->name('admin.roles.updatePermissions');
    Route::delete('/admin/roles/{id}', [RoleController::class, 'destroy'])->name('admin.roles.delete');

    // permissions
    Route::get('/admin/permissions', [PermissionController::class, 'index'])->name('admin.permissions.index');
    Route::get('/admin/permissions/create', [PermissionController::class, 'create'])->name('admin.permissions.create');
    Route::post('/admin/permissions', [PermissionController::class, 'store'])->name('admin.permissions.store');

    Route::get('/admin/projects', [ProjectController::class, 'index'])->name('admin.projects.index');
    Route::get('/admin/projects/create', [ProjectController::class, 'create'])->name('admin.projects.create');
    Route::post('/admin/projects', [ProjectController::class, 'store'])->name('admin.projects.store');
    Route::get('/admin/projects/edit', [ProjectController::class, 'edit'])->name('admin.projects.edit');
    Route::put('/admin/projects/update', [ProjectController::class, 'update'])->name('admin.projects.update');
    Route::get('/admin/project/{project}', [ProjectController::class, 'show'])->name('admin.projects.show');
    Route::delete('/admin/project/{project}', [ProjectController::class, 'destroy'])->name('admin.projects.delete');
    Route::post('/admin/projects/add/developer/{project}', [ProjectController::class, 'addDeveloper'])->name('admin.projects.addDeveloper');
    Route::delete('/admin/projects/remove/developer/{project}/{developer}', [ProjectController::class, 'removeDeveloper'])->name('admin.projects.removeDeveloper');
});

Route::middleware(['auth', 'role:developpeur'])->group(function () {    

    Route::get('/developpeur/projects', [ProjectController::class, 'index'])->name('developpeur.projects.index');
    Route::get('/developpeur/projects/{project}', [ProjectController::class, 'show'])->name('developpeur.projects.show');
});

Route::middleware(['auth', 'role:client'])->group(function () {
   
    Route::get('/client/projects', [ProjectController::class, 'index'])->name('client.projects.index');
    Route::get('/client/projects/{project}', [ProjectController::class, 'show'])->name('client.projects.show');
});

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/send-mail', [ContactController::class, 'sendMail'])->name('send.mail');