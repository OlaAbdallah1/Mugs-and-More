<?php

namespace App\Http\Controllers\User;

use App\Models\Cart;
use App\Models\PurchasedOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PurchaseOperation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PurchaseOperationController extends Controller
{
    public function create(Request $purchase)
    {
        if (Auth::id()) {
            $orders = Cart::all();
            if (count($orders) == 0) {
                Session::flash('warning', 'You have no orders');
                return redirect()->back();
            } else {
                PurchaseOperation::create([
                    'user_id' => auth()->user()->id,
                    'area' => $purchase['area'],
                    'postal_code' => $purchase['postal_code'],
                    'shipping_cost' => $purchase['shipping_cost'],
                    'total_cost' => $purchase['total_cost'],
                ]);
            }
            return redirect('/user/clear-cart');
        } else {
            return redirect('login');
        }
    }

    public function index() 
    {
        if (Auth::id()) {
            $purchases = PurchaseOperation::all();
            return view('user.purchase')->with('purchases', $purchases);
        } else {
            return redirect('login');
        }
    }
}
