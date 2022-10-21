<?php

namespace App\Http\Controllers\User;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\PurchasedOrder;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class PurchasedOrderController extends Controller
{

    public function index($id)
    {
        if (Auth::id()) {
            $purchased_orders = PurchasedOrder::where('product_id','=',$id);
            return view('user.purchasedOrders')->with('purchased_orders', $purchased_orders);
          } else {
            return redirect('login');
          }
    }
}
