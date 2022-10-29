<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Http\Request;
use App\Models\PurchasedOrder;
use App\Models\PurchaseOperation;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        $purchased_orders = Purchase::all();
        $purchased_operations = PurchaseOperation::all();
        return view('admin.dashboard')->with('purchased_operations',$purchased_operations);
    }
    public function search(Request $request)
    {
        if ($request->search) {
            $searchProducts = Product::where('name', 'LIKE', '%' . $request->search . '%')->OrWhere('category', 'LIKE', '%' . $request->search . '%')->latest()->get();
            return view('admin.search.product')->with('searchProducts', $searchProducts);
        } else {
            return redirect()->back()->with('message', 'Empty Search');
        }
    }
   
}
