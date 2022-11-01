<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Product;
use App\Models\Feedback;
use App\Models\DetailsImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

class ProductController extends Controller
{
    public function view($id)
    {
        $product = Product::find($id);
        $feedbacks = Feedback::join('users', 'feedbacks.user_id', '=', 'users.id')
        ->select(['users.*','feedbacks.*'])
        ->where('product_id', '=', $id)
        ->get();
        
        $details_images = DetailsImage::where('product_id', '=', $id)->get();

        $similar_products = Product::where('category','=',$product->category)->OrWhere('color','=',$product->color)->where('id','!=',$id)->inRandomOrder()->limit(6)->get();
        return view('user.product')->with('product', $product)->with('details_images', $details_images)->with('feedbacks', $feedbacks)->with('similar_products',$similar_products);

    }
}
