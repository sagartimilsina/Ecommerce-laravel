<?php

use App\Http\Controllers\FrontendController;
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
});


Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/cart', [FrontendController::class, 'cart'])->name('cart');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::get('/shop', [FrontendController::class, 'shop'])->name('shop');
Route::get('/checkout', [FrontendController::class, 'checkout'])->name('checkout');
Route::get('/shop_detail', [FrontendController::class, 'shop_detail'])->name('shop_detail');
Route::get('/404', [FrontendController::class, 'pagenotfound'])->name('404');




Route::prefix('admin')->group(function () {

    Route::get('/', function () {
        return view('backend.admin_dashboard');
    })->name('admin_dashboard');
});
