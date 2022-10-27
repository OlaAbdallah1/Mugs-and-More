<?php

namespace App\Http\Controllers\User;

use session;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\PurchasedOrder;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
  public function add_to_cart(Request $request, $id){
    if (Auth::id()) {
      $user = auth()->user();
      $product = Product::find($id);
   Cart::create([
        'id' => $request->id,
        'user_id' => $user->id,
        'user_name' => $user->email,
        'product_id' => $product->id,
        'product_name' => $product->name,
        'price'=> $product->price,
        'quantity' => $request->quantity,
        'total' => $product->price * $request->quantity,
        'image' => $product->image,
      ]);
     
      return redirect()->back()->with('success', "Product Added to the Cart");
    } else {
      return redirect('login');
    }
  }

  public function cart(){
    if (Auth::id()) {
      $orders = Cart::all();
      return view('user.cart')->with('orders', $orders);
    } else {
      return redirect('login');
    }
  }

  public function delete_from_cart($id){
    $order = Cart::findOrFail($id);
    $order->delete();
    return redirect('/user/cart')->with('success', 'Order Deleted ');
  }

  public function clear_cart($id){
    if (Auth::id()) {
      $user = auth()->user();
      // $purchased_orders = new PurchasedOrder; 
      $product=Product::find($id);
     $carts=Cart::all();
    foreach($carts as $cart){
    PurchasedOrder::create([
        'user_id' => $user->id,
        'product_id'=>$cart->product_id,
        'price' => $cart->price,
        'quantity' => $cart->quantity,
        'total' => $cart->total,
      ]);  
      $product->quantity = $product->quantity - $cart->quantity;
      $product->save();
      $cart->delete();
      $cart->save();
  }
      return redirect('/user/cart')->with('success', 'Purchased Succesfully!');
    } else {
      return redirect('login');
    }
  }
}
