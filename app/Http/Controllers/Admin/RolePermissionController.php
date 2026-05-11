<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionController extends Controller
{
    // Show roles & permissions
    public function index()
    {
        $roles = Role::all();

        // Group permissions by 'group' column
        $permissions = Permission::all()->groupBy('group');

        return view('admin.roles.index', compact('roles', 'permissions'));
    }

    // Store new role
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name'
        ]);

        Role::create([
            'name' => $request->name
        ]);

        return back()->with('success', 'Role created successfully');
    }

    // Update role permissions
    public function update(Request $request)
    {
        $role = Role::findById($request->role_id);

        $permissions = $request->permissions ?? [];

        $role->syncPermissions($permissions);

        return back()->with('success', 'Permissions updated successfully');
    }

    // Delete role (optional)
    public function destroy($id)
    {
        $role = Role::findById($id);

        $role->delete();

        return back()->with('success', 'Role deleted successfully');
    }
}