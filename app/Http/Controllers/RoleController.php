<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Role;


class RoleController extends Controller
{
    public function index(){

        return view('admin.users.roles.index', [
            'roles'=> Role::all()
        ]);

    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required', // Validate that 'name' field is required
        ]);

        Role::create([
            'name'=> Str::ucfirst(request('name')),
            'slug'=> Str::lower(request('name')),
        ]);
        return back()->with('success', 'Role Added!');
    }

    public function edit(Role $role){
        return view('admin.users.roles.edit', [
            'role' => $role, // Pass the specific role data to the view
            'roles' => Role::all()
        ]);

    }


    public function update(Request $request, Role $role){
        $role->name = Str::ucfirst(request('name'));
        $role->slug = Str::of(request('name'))->slug('-');

        if($role->isDirty('name')){
            $role->save();
            return back()->with('success','Role Updated');
        } else {
            return back()->with('success','No update was done');
        }
    }
}
