<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CancellationsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EsewaPaymentController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
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



Route::get('/', [FrontendController::class, 'index'])->name('index');

Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::get('/shop', [FrontendController::class, 'shop'])->name('shop');
Route::get('/shop-detail/{id}', [FrontendController::class, 'shop_detail'])->name('shop_detail');
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
    Route::resource('/products', ProductController::class);
    Route::resource('/users', UsersController::class);
    Route::resource('/orders', OrdersController::class);
    Route::put('/update_orders_status/{id}',  [OrdersController::class, 'update_order_status'])->name('orders_status.update');
    Route::get('/all_users_pending_orders/{id}',[OrdersController::class, 'show_all_users_pending_orders'])->name('show_all_users_pending_orders');
    Route::get('/all_users_delivered_orders/{id}',[OrdersController::class, 'show_all_users_delivered_orders'])->name('show_all_users_delivered_orders');
    Route::get('/all_users_cancelled_orders/{id}',[OrdersController::class, 'show_all_users_cancelled_orders'])->name('show_all_users_cancelled_orders');
    Route::get('/pending-order', [OrdersController::class, 'pending_order'])->name('pending_order');
    Route::get('/delivered-order', [OrdersController::class, 'delivered_order'])->name('delivered_order');
    Route::get('/cancel-order', [OrdersController::class, 'cancel_order'])->name('cancel_order');
    Route::resource('/cancellations', CancellationsController::class);
    Route::resource('/categories', CategoryController::class);
    Route::resource('/payments', PaymentsController::class);

});

// Admin Routes Ends //
// User Routes Starts //
Route::prefix('/')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/user_dashboard', function () {
        return view('frontend.profile.user_dashboard');
    })->name('user_dashboard')->middleware(['auth', 'verified']);
    Route::get('/cart/{id}', [FrontendController::class, 'cart'])->name('cart');
    Route::post('/cart/{id}', [CartController::class, 'add_to_cart'])->name('add_to_cart');
    Route::put('/update-cart', [CartController::class, 'update_cart'])->name('update_cart');
    Route::get('cart', [FrontendController::class, 'cart'])->name('guest_cart');
    Route::delete('/delete-cart/{id}', [CartController::class, 'destory'])->name('delete_cart');
    Route::get('checkout', [FrontendController::class, 'checkout'])->name('checkout');
    Route::get('/user-profile', [UsersController::class, 'edit_profile'])->name('user_profile.edit');
    Route::post('/user-orders_store', [OrdersController::class, 'user_orders_store'])->name('user_orders_store');
    Route::get('/orders-payement', [OrdersController::class, 'orders_payement'])->name('orders_payement');
    Route::get('/account-details', [UsersController::class, 'account_details'])->name('account_details');
    Route::get('/address', [UsersController::class, 'address_update'])->name('address_update');
    Route::put('/user-profile', [UsersController::class, 'update'])->name('user_profile.update');
    Route::delete('/user-profile', [UsersController::class, 'destroy_profile'])->name('user_profile.destroy');
    Route::get('/user-orders_lists', [UsersController::class, 'user_orders_lists'])->name('user_orders_lists');
    Route::get('/user-orders_details/{id}', [UsersController::class, 'user_orders_details'])->name('user_orders_details');
    Route::post('esewa_payment', [EsewaPaymentController::class, 'esewa_payment'])->name('esewa_payment');
    Route::get('/esewa_payment_response', [EsewaPaymentController::class, 'esewa_payment_response'])->name('esewa_payment_response');
    Route::get('esewa_payment_failure', [EsewaPaymentController::class, 'esewa_payment_failure'])->name('esewa_payment_failure');
    Route::get('/payment-cancelled', [EsewaPaymentController::class, 'esewa_payment_cancel'])->name('esewa_payment_cancel');
    Route::get('/payment-success', [EsewaPaymentController::class, 'esewa_payment_success'])->name('esewa_payment_success');

    Route::put('/update_permanent_address/{id}', [UsersController::class, 'update_permanent_address'])->name('update_permanent_address');
    Route::post('/create_permanent_address', [UsersController::class, 'create_permanent_address'])->name('create_permanent_address');
    Route::put('/update_temporary_address/{id}', [UsersController::class, 'update_temporary_address'])->name('update_temporary_address');
    Route::post('/create_temporary_address', [UsersController::class, 'create_temporary_address'])->name('create_temporary_address');
}); Route::put('/update_delivery_address/{id}', [UsersController::class, 'update_delivery_address'])->name('update_delivery_address');
Route::post('/create_delivery_address', [UsersController::class, 'create_delivery_address'])->name('create_delivery_address');

// user Routes ends //
require __DIR__ . '/auth.php';
