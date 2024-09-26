<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
class AdminController extends Controller
{
    // Display all users with their roles
    public function index()
    {
        $users = User::with('roles')->get(); // Eager loading roles for users
        return view('admin.users.index', compact('users'));
    }

    // Show the form for editing a user's roles
    public function edit(User $user)
    {
        $roles = Role::all(); // Fetch all available roles
        return view('admin.users.edit', compact('user', 'roles'));
    }

    // Update the user's roles
    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles); // Sync the user’s roles with selected roles
        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }
}
