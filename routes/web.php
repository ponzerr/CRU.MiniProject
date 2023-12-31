<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    // ProfileController
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // AdminController
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // ItemController
    Route::get('/items', [ItemController::class, 'index'])->name('items.table');
    Route::get('/items/search', [ItemController::class, 'search'])->name('items.search');
    Route::get('/items/create', [ItemController::Class, 'create'])->name('items.create');
    Route::put('/items/store', [ItemController::Class, 'store'])->name('items.store');
    Route::get('/items/{item}/edit', [ItemController::class, 'edit'])->name('items.edit');
    Route::put('/items/{item}', [ItemController::class, 'update'])->name('items.update');


    // GroupController
    Route::get('/items/group', [GroupController::class, 'index'])->name('items_group.table');
    Route::get('/items/group/create', [GroupController::Class, 'create'])->name('items_group.create');
    Route::post('/items/group/store', [GroupController::Class, 'store'])->name('items_group.store'); 
    Route::get('/items/group/{group}/edit', [GroupController::Class, 'edit'])->name('items_group.edit');
    Route::put('/items/group/{group}', [GroupController::Class, 'update'])->name('items_group.update');

    // RoleController
    Route::get('/roles', [RoleController::class,'index'])->name('role.index');
    Route::post('/roles/store', [RoleController::class,'store'])->name('role.store');
    Route::get('/roles/{role}/edit', [RoleController::class, 'edit'])->name('role.edit');
    Route::put('/roles/{role}/update', [RoleController::class, 'update'])->name('role.update');
    
});

Route::middleware(['role:SuperAdmin', 'auth'])->group(function () {
    // UserController
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/search', [UserController::class, 'search'])->name('users.search');
    Route::get('/users/{user}/profile', [UserController::class,'show'])->name('user.profile.show');
    Route::put('admin/users/{user}/update', [UserController::class,'update'])->name('user.profile.update');
    Route::put('users/{user}/attach', [UserController::class,'attach'])->name('user.role.attach');
    Route::put('users/{user}/detach', [UserController::class,'detach'])->name('user.role.detach');
});

require __DIR__.'/auth.php';
