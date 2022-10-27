<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\PurchasedOrder;
use App\Models\PurchaseOperation;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        $purchased_orders = PurchasedOrder::all();
        $purchased_operations = PurchaseOperation::all();
        return view('admin.dashboard')->with('purchased_operations',$purchased_operations);
    }
   
}
