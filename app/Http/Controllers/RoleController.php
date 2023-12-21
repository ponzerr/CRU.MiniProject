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
}
