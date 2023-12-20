<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // route directed to app.blade.view (Home Blade)
        return view('layouts.app');
    }
}
