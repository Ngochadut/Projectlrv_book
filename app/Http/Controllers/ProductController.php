<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
       
    public function index(){
        $products = Product::with(['images:product_id,name'])->take(10)->get();
        return view('welcome', compact('products'));
    }
 
    public function detailProduct($id){
        $products_view = Product::find($id)->load('images');
        $product_category = Product::with(['images:product_id,name'])->orderByDesc('updated_at')->take(4)->get();
        // dd($products_view);
        return view('productDetail',compact('products_view','product_category'));
    }

    public function productStore(){
        $products_sell = Product::with(['images:product_id,name'])->orderByDesc('updated_at')->take(3)->get();
        $categorys = Categories::all()->take(5);
        $products = Product::with(['images:product_id,name'])->orderByDesc('updated_at')->take(6)->get();
        return view('productStore',compact('categorys','products','products_sell'));
    }
} 
