<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
  public function add_to_wishlist($id)
  {
    if (Auth::id()) {
      $user = auth()->user();
      $fav = new Wishlist;

      if ($fav->get()->contains('product_id', $id)) {
        return redirect()->back()->with('warning', 'Already in Wishlist');
      } else {
        $fav->user_id = $user->id;
        $fav->product_id = $id;
        $fav->save();
    
        return redirect()->back()->with('success', 'Added to Wishlist');
      }
    } else {
      return redirect('login');
    }
  }
  public function wishlist()
  {
    if (Auth::id()) {
       $favs = Wishlist::join('products', 'wishlists.product_id', '=', 'products.id')
        ->select('products.*')
        ->get();
      return view('user.wishlist')->with('favs', $favs);
    } else {
      return redirect('login');
    }
  }

  public function delete_from_wishlist($id)
  {
    $fav = Wishlist::findOrFail($id);
    $fav->delete();
    return redirect('/user/wishlist')->with('message', 'Deleted ');
  }

  public function find_similar($id)
  {
    $product = Product::find($id);
    $similar_products = Product::where('category','=',$product->category)->OrWhere('color','=',$product->color)->where('id','!=',$id)->inRandomOrder()->get();
    return view('user.similarProduct')->with('similar_products',$similar_products);
  }
}
