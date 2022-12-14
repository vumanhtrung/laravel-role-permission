<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboarController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//
Route::group(['prefix' => 'admincp', 'as' => 'admin.'], function () {
    Route::get('', [AuthController::class, 'showLoginForm'])->name('showLoginForm');
    Route::post('', [AuthController::class, 'login'])->name('login');

    Route::middleware(['auth'])->group(function () {
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');

        Route::get('dashboard', [DashboarController::class, 'index'])->name('dashboard');

        Route::resource('permissions', PermissionController::class, ['except' => ['store', 'update', 'destroy']]);

        Route::resource('roles', RoleController::class, ['except' => ['store', 'update', 'destroy']]);

        Route::resource('users', UserController::class, ['except' => ['store', 'update', 'destroy']]);

        Route::resource('posts', PostController::class);
    });
});
