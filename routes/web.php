<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;

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

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'login'])->name('register');
Route::post('/register', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'login'])->name('logout');
Route::get('/password/reset', [AuthController::class, 'login'])->name('password.request');
Route::middleware(['auth'])->group(function () {
    // Admin Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('home');

    // Tags Management
    Route::resource('tags', TagController::class);

    // Categories Management
    Route::resource('categories', CategoryController::class);
});
