<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
   public function cup()
   {
    $categories = Product::where('category', '=', 'cup')->get();
    return view('user.category')->with('categories', $categories);
   } 
   public function glasses()
   {
    $categories = Product::where('category', '=', 'glass')->get();
    return view('user.category')->with('categories', $categories);
   } 
   public function funkey()
   {
    $categories = Product::where('category', '=', 'funkey')->get();
    return view('user.category')->with('categories', $categories);
   } 
   public function fancy()
   {
    $categories = Product::where('category', '=', 'fancy')->get();
    return view('user.category')->with('categories', $categories);
   } 
  
   public function plate()
   {
    $categories = Product::where('category', '=', 'plate')->get();
    return view('user.category')->with('categories', $categories);
   } 
   public function kettle()
   {
    $categories= Product::where('category', '=', 'kettle')->get();
    return view('user.category')->with('categories', $categories);
   } 
   public function simple()
   {
    $categories= Product::where('category', '=', 'simple')->get();
    return view('user.category')->with('categories', $categories);
   } 

 
}
