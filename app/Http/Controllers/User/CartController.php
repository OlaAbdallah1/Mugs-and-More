<?php

namespace App\Http\Controllers\User;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function add_to_cart(Request $request, $id)
    {
      if(Auth::id()){
       $user=auth()->user();
       $product=Product::find($id);
       $order= new Order;
       $order->user_name=$user->email;
       $order->user_id=$user->id;
       $order->product_name=$product->name;
       $order->image=$product->image;
       $order->price=$product->price;
       $order->quantity=$request->quantity;
       $total_price=$product->price * $request->quantity;
       $order->total = $total_price;
       $product->quantity = $product->quantity - $request->quantity;

       $product->save();
       $order->save();

       return redirect()->back();
      }
      else {
       return redirect('login');
      }
    }
    public function cart()
    {
     $orders = Order::all();
    //  $product = Product::select('quantity')->get();
     return view('user.cart')->with('orders',$orders);
    }

    public function delete_from_cart($id)
    {
     $order = Order::findOrFail($id);
     // Storage::delete($product->image);
     
     $order->delete();
     return redirect('/user/cart')->with('message','Order Deleted ');
    }
}
