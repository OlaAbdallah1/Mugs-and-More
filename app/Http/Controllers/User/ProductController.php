<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function view($id)
    {
        $product=Product::find($id);
        $feedbacks = Feedback::find($id)->where('product_id','=', $product->id);
       return view('user.product')->with('product',$product)->with('feedbacks',$feedbacks);
    }
   
}
