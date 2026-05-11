<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Hash;

class UserController extends Controller
{

    public function index()
    {
        $users = User::with('roles')->latest()->get();
        $roles = Role::all();

        return view('admin.users.index',compact('users','roles'));
    }

    public function store(Request $request)
    {

        $user = User::create([
            'name' => $request->first_name.' '.$request->last_name,
            'mobile' => $request->mobile,
            'password' => Hash::make('123456'),
            'restaurant_id' => 1,
            'status' => $request->status,
        ]);

        $user->assignRole($request->role);

        if($request->hasFile('image')){
            $user->addMediaFromRequest('image')->toMediaCollection('users');
        }

        return back()->with('success','User created');
    }

    public function update(Request $request,$id)
    {

        $user = User::findOrFail($id);

        $user->update([
            'name'=>$request->first_name.' '.$request->last_name,
            'mobile'=>$request->mobile,
            'status' => $request->status
        ]);

        $user->syncRoles([$request->role]);

        if($request->hasFile('image')){
            $user->clearMediaCollection('users');
            $user->addMediaFromRequest('image')->toMediaCollection('users');
        }

        return back()->with('success','User updated');
    }

    public function destroy($id)
    {

        $user = User::findOrFail($id);

        $user->delete();

        return back()->with('success','User deleted');

    }

}