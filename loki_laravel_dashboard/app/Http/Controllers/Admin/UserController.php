<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() 
    {
        $users = User::all();
        $roles = Role::all();

        return view('admin.users.index', ['users' => $users, 'roles' => $roles]);
    }

    public function updateRole (Request $request, $id) 
    {
        $user = User::findOrFail($id);
        $role = $request->input('role');

        if($role && Role::where('name', $role)->exists()) {
            $user->syncRoles([$role]);
            return redirect()->route('admin.users.index')->with('success', 'Mise à jour du rôle.');
        }
        return redirect()->route('admin.users.index')->with('error', 'Une erreur inattendue s\'est produite.');


    }

    public function destroy ($id) 
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'L\'utilisateur a bien été supprimé.');
    }

    public function create() {
        $roles = Role::all();
        return view('admin.users.create', ['roles' => $roles]);
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        if($request->role && Role::where('name', $request->role)->exists()) {
            $user->assignRole($request->role);
        } else {
            $user->assignRole('client');
        }
        return redirect()->route('admin.users.index')->with('success', 'Le nouvel utilisateur ' . $request->name . ' a bien été créé.');
    }
}
