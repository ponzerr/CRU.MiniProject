<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class AdminController extends Controller
{
    public function index()
    {
        // route directed to dashboard.blade.view (admin dashboard Blade)
        return view('admin.dashboard');
    }

}
