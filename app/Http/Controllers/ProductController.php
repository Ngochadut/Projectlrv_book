<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
       
    public function index(){
        $products = Product::orderByDesc('updated_at')->take(10)->get();
        return view('welcome', compact('products'));
    }

    public function detailProduct($id){
        $product = Product::find($id);
		if($product == null) abort(404);
        
        return view('productDetail',[
            'products' => $product
        ]);
    }
} 
