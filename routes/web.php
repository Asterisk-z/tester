<?php

use App\Http\Controllers\Admin\ActivityController;
use App\Http\Controllers\Admin\DashbaordController;
use App\Http\Controllers\Admin\StudentManagementController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
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

Route::redirect('/', 'login');

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('auth.login');

Route::get('register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('register', [RegisterController::class, 'register'])->name('auth.register');

Route::get('logout', [LoginController::class, 'logout'])->name('logout');


Route::middleware(['auth', 'admin'])->prefix('admin/')->name('admin.')->group( function() {

    Route::get('dashboard', [DashbaordController::class, 'index'])->name('dashboard');

    Route::get('users', [UsersController::class, 'index'])->name('users');
    Route::post('users/store', [UsersController::class, 'store']);
    Route::delete('users/delete/{userId}', [UsersController::class, 'destroy']);


    Route::get('activities', [ActivityController::class, 'index'])->name('activities');
    Route::post('activities/store', [ActivityController::class, 'store'])->name('activities.store');
    Route::put('activities/update/{activityId}', [ActivityController::class, 'update'])->name('activities.update');
    Route::delete('activities/delete/{activityId}', [ActivityController::class, 'destroy'])->name('activities.delete');

});
