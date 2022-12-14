<?php

use App\Models\Cart;
use App\Models\Product;
use App\Models\Purchases;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\StatusController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\User\CategoryController;
use App\Http\Controllers\User\FeedbackController;
use App\Http\Controllers\User\PurchaseController;
use App\Http\Controllers\User\WishlistController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PurchaseController as AdminPurchaseController;
use App\Http\Controllers\User\PurchasedOrderController;
use App\Http\Controllers\User\PurchaseOperationController;
use App\Http\Controllers\User\ProductController as UserProductController;

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


Route::get('/test', function () {
    $result = Cart::join('products', 'carts.product_id', '=', 'products.id')
    ->select('products.*')
    ->get();
echo($result);});

Auth::routes();

Route::prefix('/admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/search/product',[DashboardController::class,'search']);

    Route::get('/product', [ProductController::class, 'show']);
    Route::get('/product/create', [ProductController::class, 'create']);
    Route::post('/product', [ProductController::class, 'store']);
    Route::get('product/edit/{id}', [ProductController::class, 'edit']);
    Route::put('/product/update/{id}', [ProductController::class, 'update']);
    Route::delete('/product/delete/{id}', [ProductController::class, 'delete']);

    //Status
    Route::get('/earnings',[StatusController::class, 'earnings']);
    Route::get('/orders', [StatusController::class, 'orders']);
    Route::get('/status/instock', [StatusController::class, 'in_stock']);
    Route::get('/status/outorders', [StatusController::class, 'out_orders']);
    Route::get('/status/delivered', [StatusController::class, 'delivered']);

    Route::get('/purchases/{id}', [AdminPurchaseController::class, 'purchases']);
    //mark status
    Route::put('/order/out/{id}',[AdminPurchaseController::class,'order_out']);
    Route::put('/order/delivered/{id}',[AdminPurchaseController::class,'order_delivered']);

    Route::get('/search/purchase',[StatusController::class,'search']);


});
Route::prefix('/user')->group(function () {
    //Home 
    Route::get('/home', [UserController::class, 'home']);
    Route::post('/home', [UserController::class, 'home']);

    Route::get('/search',[UserController::class,'search']);
    //categories 
    Route::get('/home/cups', [CategoryController::class, 'cup']);
    Route::get('/home/glasses', [CategoryController::class, 'glasses']);
    Route::get('/home/funkey', [CategoryController::class, 'funkey']);
    Route::get('/home/fancy', [CategoryController::class, 'fancy']);
    Route::get('/home/plates', [CategoryController::class, 'plate']);
    Route::get('/home/kettle', [CategoryController::class, 'kettle']);
    Route::get('/home/simple', [CategoryController::class, 'simple']);

    //product details 
    Route::get('/product/view/{id}', [UserProductController::class, 'view']);
    Route::delete('/feedback/delete/{id}',[FeedbackController::class,'delete']);
   

    //Cart
    Route::post('/product/add/order/{id}', [CartController::class, 'add_to_cart']);
    Route::get('/cart', [CartController::class, 'cart']);
    Route::delete('/order/delete/{id}', [CartController::class, 'delete_from_cart']);
    Route::get('/clear-cart/{id}', [CartController::class, 'clear_cart']);
    // Route::post('/clear-cart', [CartController::class, 'clear_cart']);


    //Wishlist
    Route::post('/product/add/wishlist/{id}', [WishlistController::class, 'add_to_wishlist']);
    Route::get('/wishlist', [WishlistController::class, 'wishlist']);
    Route::delete('/wishlist/delete/{id}', [WishlistController::class, 'delete_from_wishlist']);
    Route::get('/product/findsimilar/{id}', [WishlistController::class, 'find_similar']);

    //purchase operation 
    Route::post('/purchase', [PurchaseOperationController::class, 'create']);
    Route::get('/purchase', [PurchaseOperationController::class, 'index']);

    //purchased orders
    Route::get('/purchases/{id}', [PurchaseController::class, 'index']);

    //Feedback
    Route::post('/product/feedback/{id}', [FeedbackController::class, 'create']);
});
