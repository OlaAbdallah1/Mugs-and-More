<?php

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\User\PurchaseController;
use App\Http\Controllers\User\WishlistController;
use App\Http\Controllers\User\CartController;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::prefix('/admin')->  middleware(['auth','isAdmin'])->group( function () {
    Route::get('/dashboard', [DashboardController::class,'index']);
    Route::get('/product', [ProductController::class,'show']);
    Route::get('/product/create', [ProductController::class,'create']);
    Route::post('/product',[ProductController::class,'store']);
    Route::get('product/edit/{id}',[ProductController::class,'edit']);
    Route::put('/product/update/{id}',[ProductController::class,'update']);
    Route::delete('/product/delete/{id}',[ProductController::class,'delete']);
 });
 Route::prefix('/user')->group(function(){
    //Home 
     Route::get('/home',[UserController::class,'home']);
     //Cart
     Route::post('/product/add/order/{id}',[CartController::class,'add_to_cart']);
     Route::get('/cart',[CartController::class,'cart']);
     Route::delete('/order/delete/{id}',[CartController::class,'delete_from_cart']);
     Route::post('/clear-cart',[CartController::class,'clear_cart']);
     Route::get('/clear-cart',[CartController::class,'clear_cart']);

     //Wishlist
     Route::post('/product/add/wishlist/{id}',[WishlistController::class,'add_to_wishlist']);
     Route::get('/wishlist',[WishlistController::class,'wishlist']);
     Route::delete('/wishlist/delete/{id}',[WishlistController::class,'delete_from_wishlist']);

     //
     Route::post('/purchase',[PurchaseController::class,'create']);
     Route::get('/purchases',[PurchaseController::class,'index']);
 });


