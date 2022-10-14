<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProductFormRequest;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function create()
    {
            return view('admin.product.create');
    }

protected function store(Request $product)
{

    $validatedData=$product->validate([
        'name'=>'required | string',
        'price'=>'required',
        'description'=>'nullable|string',
        'image'=>'nullable | image | mimes:png,jpg,jpeg',
        'quantity'=>'required',
        'color'=>'required',
    ]);

    // if($product->hasFile('image')){
    //     $file = $product->file('image');
    //     $ext = $file->getClientOriginalExtension();
    //     $filename = time().'.'.$ext;
    //     // $file->move('public/products',$filename);
    // //     // $product['image']= $filename;
    //     $filename = Storage::putFile("products",$validatedData['image']);
    //     $validatedData['image']= $filename;

//  }
        
  Product::create($validatedData);

   return redirect('/admin/product')->with('message','Product Added ');
}
    public function show(){
        $products = Product::paginate(4);
        return view('admin.product.show')->with ('products',$products);      
    }

    public function edit($id){
        $product=Product::findOrFail($id);
        return view('admin.product.edit')->with('product',$product);
    }
    
    public function delete($id){
        $product = Product::findOrFail($id);
        // Storage::delete($product->image);
        $product->delete();
        return redirect('/admin/product')->with('message','Product Deleted ');
      }
    
      public function update(Request $request,$id){
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->image = $request->image;
        $product->quantity = $request->quantity;
        $product->save();
        return redirect('/admin/product')->with('message','Product Updated ');
      }
}
