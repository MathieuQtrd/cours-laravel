<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
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
});