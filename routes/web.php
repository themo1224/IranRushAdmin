<?php

use App\Http\Controllers\Assets\PhotoController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NotificationController;
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

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
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
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');

    Route::get('/notifications/{id}/read', [NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');
    Route::get('/notifications/read-all', [NotificationController::class, 'markAllAsRead'])->name('notifications.markAllAsRead');
    Route::delete('/notifications/{id}', [NotificationController::class, 'destroy'])->name('notifications.destroy');

    Route::resource('assets/photo', PhotoController::class);

});
