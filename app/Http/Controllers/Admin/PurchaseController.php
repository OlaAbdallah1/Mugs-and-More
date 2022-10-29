<?php

namespace App\Http\Controllers\Admin;

use App\Models\Purchase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PurchaseOperation;

class PurchaseController extends Controller
{
    public function purchases($id)
    {
        $purchased_orders = Purchase::join('purchase_operations','purchases.purchased_operation_id','=','purchase_operations.id')
        ->join('carts','purchases.cart_id','=','carts.id')
        ->join('products', 'carts.product_id', '=', 'products.id')
        ->select('purchases.*')
        ->select(['products.name', 'products.price', 'products.image', 'carts.quantity', 'carts.total','carts.deleted_at'])
        ->where('purchases.purchased_operation_id','=',$id)
         ->get();
        
         $purchased_operation=PurchaseOperation::find($id);
        return view('admin.purchasedOrders')->with('purchased_orders', $purchased_orders)->with('purchased_operation',$purchased_operation);
      
    }
    public function order_out($id)
    {
        $purchased_operation=PurchaseOperation::find($id);
        $purchased_operation->update(['status' => '1']);
        return redirect()->back()->with('success','marked as out');
    }
    public function order_delivered($id)
    {
        $purchased_operation=PurchaseOperation::find($id);
        $purchased_operation->update(['status' => '2']);
        return redirect()->back()->with('success','marked as delivered');

    }
}
