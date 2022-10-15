<?php

namespace App\Http\Controllers\User;

use App\Models\Order;
use App\Models\Purchase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PurchaseController extends Controller
{
    public function create(Request $purchuse)
    {
        if (Auth::id()) {
            $orders = Order::all();
            if (count($orders) == 0) {
                Session::flash('warning', 'You have no orders');
                return redirect()->back();
            } else {
                Purchase::create([
                    'user_id' => auth()->user()->id,
                    'area' => $purchuse['area'],
                    'postal_code' => $purchuse['postal_code'],
                    'shipping_cost' => $purchuse['shipping_cost'],
                    'total_cost' => $purchuse['total_cost'],
                ]);
            }
            return redirect('/user/clear-cart');
        } else {
            return view('login');
        }
    }

    public function index()
    {
        if (Auth::id()) {
            $purchases = Purchase::all();
            return view('user.purchase')->with('purchases', $purchases);
        } else {
            return view('login');
        }
    }
}
