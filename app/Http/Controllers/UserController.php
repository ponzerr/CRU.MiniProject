<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    public function index(){

        $users = User::orderBy('last_seen', 'DESC')->get();
        return view('admin.users.users_table', ['users'=>$users]);
    }

    public function show(User $user){
        
        return view ('admin.users.users_profile', [
            'user'=> $user,
            'roles'=>Role::all()    
        
        ]);
    }

    public function update(User $user) {
        $inputs = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'contact' => ['required', 'numeric'],
            'position' => ['nullable', 'string', 'max:255'],
            'department' => ['nullable', 'string', 'max:255'],
        ]);
    
        $user->update($inputs);
    
        return back();
    }

    public function attach(User $user){

        $user->roles()->attach(request('role'));

        return back();    
    }

    public function detach(User $user){

        $user->roles()->detach(request('role'));

        return back();      
    }
}
