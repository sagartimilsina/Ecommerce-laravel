<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProfileController;
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
Route::get('/cart', [FrontendController::class, 'cart'])->name('cart');
Route::get('/shop-detail', [FrontendController::class, 'shop_detail'])->name('shop-detail');
Route::get('/404', [FrontendController::class, 'pagenotfound'])->name('pagenotfound');
Route::get('checkout', [FrontendController::class, 'checkout'])->name('checkout');

Route::prefix('admin')->group(function () {

    Route::get('/', function () {
        return view('backend.admin_dashboard');
    })->name('admin_dashboard');
});

Route::get('/user_dashboard', function(){

    return view('frontend.profile.user_dashboard');
})->name('user_dashboard');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
