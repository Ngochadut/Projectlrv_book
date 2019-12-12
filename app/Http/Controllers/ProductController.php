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

    public function sale(){
        $categoryvh = Categories::where('name','=','Văn Học')->first();
        $products_vh = Product::with(['images:product_id,name'])->where('category_id','=',$categoryvh->id)->orderByDesc('updated_at')->take(4)->get();
       
        $categorykt = Categories::where('name','=','Kinh Tế')->first();
        $products_kt = Product::with(['images:product_id,name'])->where('category_id','=',$categorykt->id)->orderByDesc('updated_at')->take(4)->get();


        $categorykn = Categories::where('name','=','Kĩ Năng Sống')->first();
        $products_kn = Product::with(['images:product_id,name'])->where('category_id','=',$categorykn->id)->orderByDesc('updated_at')->take(4)->get();

        $products = Product::with(['images:product_id,name'])->orderByDesc('updated_at')->take(10)->get();
        return view('sale', compact('products','products_vh','products_kt','products_kn'));
    }
} 
   