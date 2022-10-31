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
    $category = 'Cups';
    return view('user.category')->with('categories', $categories)->with('category', $category);
   } 
   public function glasses()
   {
    $categories = Product::where('category', '=', 'glass')->get();
    $category = 'Glasses';
    return view('user.category')->with('categories', $categories)->with('category', $category);
   } 
   public function funkey()
   {
    $categories = Product::where('category', '=', 'funkey')->get();
    $category = 'Funkey Mugs';
    return view('user.category')->with('categories', $categories)->with('category', $category);
   } 
   public function fancy()
   {
    $categories = Product::where('category', '=', 'fancy')->get();
    $category = 'Fancy';
    return view('user.category')->with('categories', $categories)->with('category', $category);
   } 
  
   public function plate()
   {
    $categories = Product::where('category', '=', 'plate')->get();
    $category = 'Plates';
    return view('user.category')->with('categories', $categories)->with('category', $category);
   } 
   public function kettle()
   {
    $categories= Product::where('category', '=', 'kettle')->get();
    $category = 'Teapots';
    return view('user.category')->with('categories', $categories)->with('category', $category);
   } 
   public function simple()
   {
    $categories= Product::where('category', '=', 'simple')->get();
    $category = 'Simple & Elegant';
    return view('user.category')->with('categories', $categories)->with('category', $category);
   } 

 
}
