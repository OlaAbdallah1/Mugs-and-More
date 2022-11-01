<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\PurchaseOperation;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Purchase;

class StatusController extends Controller
{

    public function earnings()
    {
        $orders = Purchase::join('carts','purchases.cart_id','=','carts.id')
        ->join('products', 'carts.product_id', '=', 'products.id')
        ->select('purchases.*')
        ->select(['products.name', 'products.price', 'products.image', 'carts.quantity', 'carts.total','carts.deleted_at','carts.user_id'])
        ->orderBy('carts.deleted_at', 'desc')
         ->get();
        return view('admin.status.earnings')->with('orders', $orders);
    }
    public function orders()
    {
        $purchases = PurchaseOperation::orderBy('id', 'desc')->get();
        return view('admin.status.purchase')->with('purchases', $purchases);
    }
    public function search(Request $request)
    {
        if ($request->search) {
            $searchPurchases = PurchaseOperation::where('created_at', 'LIKE', '%' . $request->search . '%')->latest()->get();
            return view('admin.search.purchase')->with('searchPurchases', $searchPurchases);
        } else {
            return redirect()->back()->with('message', 'Empty Search');
        }
    }
    public function in_stock()
    {
        $purchases = PurchaseOperation::where('status', '=', '0')->orderBy('id', 'desc')->get();
        return view('admin.status.purchase')->with('purchases', $purchases);
    }

    public function out_orders()
    {
        $purchases = PurchaseOperation::where('status', '=', '1')->orderBy('id', 'desc')->get();
        return view('admin.status.purchase')->with('purchases', $purchases);
    }

    public function delivered()
    {
        $purchases = PurchaseOperation::where('status', '=', '2')->orderBy('id', 'desc')->get();
        return view('admin.status.purchase')->with('purchases', $purchases);
    }
}
