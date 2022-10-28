<?php

namespace App\Http\Controllers\User;

use session;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Http\Request;
use App\Models\PurchasedOrder;
use App\Http\Controllers\Controller;
use App\Models\PurchaseOperation;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
  public function add_to_cart(Request $request, $id)
  {
    if (Auth::id()) {
      $user = auth()->user();
      $product = Product::find($id);
      Cart::create([
        'user_id' => $user->id,
        'product_id' => $id,
        'quantity' => $request->quantity,
        'total' => $product->price * $request->quantity,
      ]);

      return redirect()->back()->with('success', "Product Added to the Cart");
    } else {
      return redirect('login');
    }
  }

  public function cart()
  {
    if (Auth::id()) {
      $orders = Cart::join('products', 'carts.product_id', '=', 'products.id')
        ->select(['products.name', 'products.price', 'products.image', 'carts.quantity', 'carts.total', 'carts.created_at'])
        ->get();
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

  public function clear_cart($lastInsertID)
  {
    if (Auth::id()) {
      $user = auth()->user();
      $carts = Cart::all();  
      foreach ($carts as $cart) {
        $purchase = new Purchase;

        $purchase->user_id = $user->id;
        $purchase->cart_id = $cart->id;
        $purchase->purchased_operation_id =  $lastInsertID;
        $purchase->save();
        
        $products = Product::where('id', $cart->product_id)->get();
        foreach ($products as $product) {
          $product->quantity = $product->quantity - $cart->quantity;
          $product->save();
        }
        $cart->delete();
        $cart->save();
      }
      return redirect('/user/cart/')->with('success', 'Purchased Succesfully!');
    } else {
      return redirect('login');
    }
  }
 
}
