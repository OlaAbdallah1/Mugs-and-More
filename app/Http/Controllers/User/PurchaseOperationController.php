<?php

namespace App\Http\Controllers\User;

use console;
use App\Models\Cart;
use App\Models\Purchase;
use Illuminate\Http\Request;
use App\Models\PurchasedOrder;
use App\Models\PurchaseOperation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Console\Output\ConsoleOutput;

class PurchaseOperationController extends Controller
{
    public function create(Request $purchase)
    {
        if (Auth::id()) {
            $orders = Cart::all();
            $user = auth()->user();
            if (count($orders) == 0) {
                Session::flash('warning', 'You have no orders');
                return redirect()->back();
            } else {
              $create= PurchaseOperation::create([
                    'user_id' => $user->id,
                    'area' => $purchase['area'],
                    'postal_code' => $purchase['postal_code'],
                    'shipping_cost' => $purchase['shipping_cost'],
                    'total_cost' => $purchase['total_cost'],
                ]);
                $lastInsertID = $create->id;
            }
            return redirect("/user/clear-cart/$lastInsertID");
        } else {
            return redirect('login');
        }
    }

    public function index()
    {
        if (Auth::id()) {
            $user = Auth::user();
            $purchases = PurchaseOperation::where('user_id', '=', $user->id)->orderBy('id','desc')->get();
            return view('user.purchase')->with('purchases', $purchases);
        } else {
            return redirect('login');
        }
    }
}
