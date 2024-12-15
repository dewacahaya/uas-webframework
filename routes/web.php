<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BusanaController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReportController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('home');
})->name('home');

// Admin Login
Route::get('login', [AdminController::class, 'index'])->name('login');
Route::post('login-proses', [AdminController::class, 'login_proses'])->name('login.proses');
Route::get('logout', [AdminController::class, 'logout'])->name('admin.logout');

// Admin Dashboard
Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('admin/busanas', [BusanaController::class, 'index'])->name('busana.index');
    Route::get('admin/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('admin/reports', [ReportController::class, 'index'])->name('reports.index');
});
