<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\PurchaseOperation;
use App\Http\Controllers\Controller;

class StatusController extends Controller
{
    public function orders()
    {
        $purchases = PurchaseOperation::orderBy('id','desc')->get();
        return view('admin.status.purchase')->with('purchases',$purchases);
    }
    public function in_stock()
    {
        $purchases = PurchaseOperation::where('status','=','0')->get();
        return view('admin.status.purchase')->with('purchases',$purchases);
    }
    
    public function out_orders()
    {
        $purchases = PurchaseOperation::where('status','=','1')->get();
        return view('admin.status.purchase')->with('purchases',$purchases);
    }
    
    public function delivered()
    {
        $purchases = PurchaseOperation::where('status','=','2')->get();
        return view('admin.status.purchase')->with('purchases',$purchases);
    }
    
}
