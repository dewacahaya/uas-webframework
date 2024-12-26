<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BusanaController;
use App\Http\Controllers\CustomerController;
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



// Admin Login
Route::get('admin/login', [AdminController::class, 'index'])->name('admin.login');
Route::post('login-proses', [AdminController::class, 'login_proses'])->name('login.proses');
Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// Admin Dashboard
Route::middleware(['admin.auth'])->group(function () {
    // DASHBOARD
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // PROFILE
    Route::get('/admin/profile', [AdminController::class, 'editProfile'])->name('admins.profile');
    Route::post('/admin/profile/update/{admin_id}', [AdminController::class, 'updateProfile'])->name('admin.profile.update');

    // BUSANA
    Route::get('admin/busanas', [BusanaController::class, 'index'])->name('busana.index');
    Route::get('admin/busana/create', [BusanaController::class, 'create'])->name('busana.create');
    Route::post('admin/busana/store', [BusanaController::class, 'store'])->name('busana.store');
    Route::get('admin/busanas/edit/{busana_id}', [BusanaController::class, 'edit'])->name('busana.edit');
    Route::put('admin/busanas/update/{busana_id}', [BusanaController::class, 'update'])->name('busana.update');
    Route::get('admin/busanas/show/{busana_id}', [BusanaController::class, 'show'])->name('busana.show');
    Route::delete('admin/busanas/destroy/{busana_id}', [BusanaController::class, 'destroy'])->name('busana.destroy');

    // ORDERS
    Route::get('admin/orders', [OrderController::class, 'index'])->name('orders.index');

    // REPORTS
    Route::get('admin/reports', [ReportController::class, 'index'])->name('reports.index');
});





// Customer Routes
Route::get('/', [CustomerController::class, 'showHomePage'])->name('customer.home');
Route::get('/recommendation', [CustomerController::class, 'showRecommendationPage'])->name('customer.recommendation');


Route::post('/register', [CustomerController::class, 'register'])->name('customer.register');
Route::post('/login', [CustomerController::class, 'login'])->name('customer.login');
Route::post('/logout', [CustomerController::class, 'logout'])->name('customer.logout');

// Protected Routes
Route::middleware(['customer.auth'])->group(function () {
    Route::get('/cart', [CustomerController::class, 'showCart'])->name('customer.cart');
    Route::post('/cart/add/{busana}', [CustomerController::class, 'addToCart'])->name('customer.cart.add');
    Route::delete('/cart/remove/{busana}', [CustomerController::class, 'removeFromCart'])->name('customer.cart.remove');

    Route::get('/orders', [OrderController::class, 'showOrders'])->name('customer.orders');
    Route::post('/orders/create', [OrderController::class, 'createOrder'])->name('customer.order.create');

    Route::resource('busanas', BusanaController::class)->except(['destroy']);
});
