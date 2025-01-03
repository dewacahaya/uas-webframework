<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
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
});


// customer
Route::get('/cart', function () {
    return view('cart');
});

Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');


Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');

Route::get('/order', function () {
    return view('customers.order');

});
