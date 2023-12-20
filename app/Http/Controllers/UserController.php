<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){

        $users = User::orderBy('last_seen', 'DESC')->get();
        return view('admin.users.users_table', ['users'=>$users]);
    }

    public function show(User $user){

    }
}
