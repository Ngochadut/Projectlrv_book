<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Product;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index(){
        $categorys = Categories::all();
        $products = Product::with(['images:product_id,name'])->orderByDesc('updated_at')->take(5)->get();

        $categorykn = Categories::where('name','=','Kĩ Năng Sống')->first();
        $products_kn = Product::with(['images:product_id,name'])->where('category_id','=',$categorykn->id)->orderByDesc('updated_at')->take(4)->get();
            
            
        return view('store', compact('categorys','products','products_kn'));
    }
}
