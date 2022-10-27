<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProductFormRequest;
use App\Models\DetailsImage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function create()
    {
        return view('admin.product.create');
    }

    protected function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required | string',
            'price' => 'required',
            'description' => 'nullable|string',
            'image' => 'nullable | image | mimes:png,jpg,jpeg',
            'category' => 'nullable | string',
            'quantity' => 'required',
            'color' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $image =  $request->file('image');
            $filename = $image->store('', ['disk' => 'products']);
            $validatedData['image'] = $filename;
        }
        // Product::create($validatedData);
        $product = new Product;
        $product->name = $validatedData['name'];
        $product->description = $validatedData['description'];
        $product->price = $validatedData['price'];
        $product->quantity = $validatedData['quantity'];
        $product->color = $validatedData['color'];
        $product->image = $validatedData['image'];
        $product->category = $validatedData['category'];
        $product->save();

        if ($request->hasFile('details_images')) {
            foreach ($request->file('details_images') as $imagefile) {
                $path = $imagefile->store('', ['disk' => 'details_images']);
                $image = new DetailsImage;
                $image->detail_image = $path;
                $image->product_id = $product->id;
                $image->save();
            }
        }

        return redirect('/admin/product')->with('success', 'Product Added ');
    }
    public function show()
    {
        $products = Product::all();
        return view('admin.product.show')->with('products', $products);
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.product.edit')->with('product', $product);
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        // Storage::delete($product->image);
        $product->delete();
        return redirect('/admin/product')->with('message', 'Product Deleted ');
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->image = $request->image;
        $product->category = $request->category;
        $product->quantity = $request->quantity;
        $product->save();
        return redirect('/admin/product')->with('message', 'Product Updated ');
    }
}
