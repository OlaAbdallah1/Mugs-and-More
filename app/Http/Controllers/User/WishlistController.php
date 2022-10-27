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
      $product = Product::find($id);
      $fav = new Wishlist;

      if ($fav->get()->contains('product_id', $id)) {
        return redirect()->back()->with('warning', 'Already in Wishlist');
      } else {
        $fav->user_name = $user->email;
        $fav->user_id = $user->id;
        $fav->product_id = $product->id;
        $fav->image = $product->image;
        $fav->product_name = $product->name;
        $fav->price = $product->price;

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
      $favs = Wishlist::all();
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
}
