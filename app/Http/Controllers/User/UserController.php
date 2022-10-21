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
    public function home(){
        if(Auth::id()){
        $products = Product::all();
        return view('user.home')->with('products',$products); 
        }else{
        return redirect('login');
        }
     }

}
