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
  public function add_to_cart(Request $request, $id)
  {
    if (Auth::id()) {
      $user = auth()->user();
      $product = Product::find($id);
      $cart = new Cart;
      $cart->user_name = $user->email;
      $cart->user_id = $user->id;
      $cart->product_name = $product->name;
      $cart->image = $product->image;
      $cart->price = $product->price;
      $cart->quantity = $request->quantity;
      $total_price = $product->price * $request->quantity;
      $cart->total = $total_price;
      $product->quantity = $product->quantity - $request->quantity;

      $purchased_orders = new PurchasedOrder;
      $purchased_orders->user_id = $user->id;
      $purchased_orders->user_name = $user->email;
      $purchased_orders->product_name = $cart->product_name;
      $purchased_orders->image = $cart->image;
      $purchased_orders->price = $cart->price;
      $purchased_orders->quantity = $cart->quantity;
      $purchased_orders->total = $cart->total;

      $purchased_orders->save();
      $product->save();
      $cart->save();

      return redirect()->back()->with('success', "Product Added to the Cart");
    } else {
      return redirect('login');
    }
  }
  public function cart()
  {
    if (Auth::id()) {
      $orders = Cart::all();
      return view('user.cart')->with('orders', $orders);
    } else {
      return redirect('login');
    }
  }

  public function delete_from_cart($id)
  {

    $order = Cart::findOrFail($id);
    $order->delete();
    return redirect('/user/cart')->with('success', 'Order Deleted ');
  }

  public function clear_cart()
  {
    if (Auth::id()) {     
      Cart::truncate();
      return redirect('/user/cart')->with('success', 'Purchased Succesfully!');
    } else {
      return redirect('login');
    }
  }
}
