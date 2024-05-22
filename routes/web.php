<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
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

Route::get('/', function () {
    return view('frontend.index');
})->name('index');

Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::get('/shop', [FrontendController::class, 'shop'])->name('shop');
Route::get('/shop-detail', [FrontendController::class, 'shop_detail'])->name('shop_detail');
Route::get('/404', [FrontendController::class, 'pagenotfound'])->name('pagenotfound');


//   Admin Routes Starts //
Route::prefix('admin')->middleware(['admin', 'auth', 'verified'])->group(function () {

    Route::get('/', function () {
        return view('backend.admin_dashboard');
    })->name('admin_dashboard')->middleware(['auth', 'admin', 'verified']);
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Routes Ends //

// User Routes Starts //
Route::prefix('/')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/user_dashboard', function () {
        return view('frontend.profile.user_dashboard');
    })->name('user_dashboard')->middleware(['auth', 'verified']);
    Route::get('/cart', [FrontendController::class, 'cart'])->name('cart');
    Route::get('checkout', [FrontendController::class, 'checkout'])->name('checkout');
    Route::get('/user-profile', [UsersController::class, 'edit_profile'])->name('user_profile.edit');
    Route::get('/account-details', [UsersController::class, 'account_details'])->name('account_details');
    Route::get('/address', [UsersController::class, 'address_update'])->name('address_update');
    Route::patch('/user-profile', [UsersController::class, 'update_profile'])->name('user_profile.update');
    Route::delete('/user-profile', [UsersController::class, 'destroy_profile'])->name('user_profile.destroy');
    Route::get('/user-orders_lists', [UsersController::class, 'user_orders_lists'])->name('user_orders_lists');
    Route::get('/user-orders_details', [UsersController::class, 'user_orders_details'])->name('user_orders_details');
});

// user Routes ends //
require __DIR__ . '/auth.php';
