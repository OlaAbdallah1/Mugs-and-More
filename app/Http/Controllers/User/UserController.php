<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function home()
    {
        if (Auth::id()) {
            $recent_products = Product::orderBy('id', 'desc')->limit(6)->get();
            $recent_products1 = Product::orderBy('id', 'desc')->offset(7)->limit(6)->get();
            $recent_products2 = Product::orderBy('id', 'desc')->offset(13)->limit(6)->get();


            $products = Product::inRandomOrder()->get();
            return view('user.home')->with('products', $products)->with('recent_products', $recent_products)->with('recent_products1', $recent_products1)->with('recent_products2', $recent_products2);
        } else {
            return redirect('login');
        }
    }

    public function search(Request $request)
    {
        if ($request->search) {
            $searchProducts = Product::where('name', 'LIKE', '%' . $request->search . '%')->OrWhere('category', 'LIKE', '%' . $request->search . '%')->latest()->get();
            return view('user.search')->with('searchProducts', $searchProducts);
        } else {
            return redirect()->back()->with('message', 'Empty Search');
        }
    }
}
