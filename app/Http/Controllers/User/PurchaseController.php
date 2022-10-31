<?php

namespace App\Http\Controllers\User;

use App\Models\Cart;
use App\Models\Purchase;
use Illuminate\Http\Request;
use App\Models\PurchaseOperation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{

  public function index($id)
  {
    if (Auth::user()) {
      $purchased_orders = Purchase::join('purchase_operations','purchases.purchased_operation_id','=','purchase_operations.id')
      ->join('carts','purchases.cart_id','=','carts.id')
      ->join('products', 'carts.product_id', '=', 'products.id')
      ->select('purchases.*')
      ->select(['products.name', 'products.price', 'products.image', 'carts.quantity', 'carts.total','carts.deleted_at'])
      ->where('purchases.purchased_operation_id','=',$id)
       ->get();

       $purchase_operation = PurchaseOperation::findOrFail($id);
       $status= $purchase_operation->status;
      return view('user.purchasedOrders')->with('purchased_orders', $purchased_orders)->with('status',$status);
    } else {
      return redirect('login');
    }
  }
}
