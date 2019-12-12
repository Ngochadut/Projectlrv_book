<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Image;
use App\Orders;
use DB;
use App\Users;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;

class HomeController extends Controller
{
    /** 
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard. 
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // echo $request->category;
        if(!$request->search) {
            $categoryvh = Categories::where('name','=','Văn Học')->first();
            $products_vh = Product::with(['images:product_id,name'])->where('category_id','=',$categoryvh->id)->orderByDesc('updated_at')->take(3)->get();
           
            $categorykt = Categories::where('name','=','Kinh Tế')->first();
            $products_kt = Product::with(['images:product_id,name'])->where('category_id','=',$categorykt->id)->orderByDesc('updated_at')->take(3)->get();

            $categorykn = Categories::where('name','=','Kĩ Năng Sống')->first();
            $products_kn = Product::with(['images:product_id,name'])->where('category_id','=',$categorykn->id)->orderByDesc('updated_at')->take(3)->get();
            
            

            $products_newest = Product::with(['images:product_id,name'])->orderByDesc('updated_at')->take(3)->get();
            $products = Product::with(['images:product_id,name'])->orderByDesc('updated_at')->take(8)->get();
            $products = Product::with(['images:product_id,name'])->orderByDesc('updated_at')->take(8)->get();
            $products_sell = Product::with(['images:product_id,name'])->orderByDesc('updated_at')->take(3)->get();
            $categorys = Categories::all();

            return view('welcome', compact('products','products_newest','products_sell','categorys','products_vh','products_kt','products_kn'));
        // categories
        }
        //search
        else {
            $categorys = Categories::all();
            $category = Categories::where('name', 'LIKE', '%'.$request->category.'%')->first();
            // dd($category);
            if($category) {
                // dd($category);
                $products_newest = Product::with(['images:product_id,name'])->orderByDesc('updated_at')->take(3)->get();
                $products = Product::with(['images:product_id,name'])->where([['name', 'LIKE', '%'.$request->search.'%'],['category_id', '=', $category->id]])->orderByDesc('updated_at')->get();
                // return view('productStore', compact(['products' => $products,'products_newest','products_sell','categorys', ['category_id' => $category->id], ['search' => 'abc']]));
                return view('productStore', ['category_id' => $category->id, 'search' => $request->search],compact('products','categorys','products_newest'));
            }
            else {
                $products = Product::with(['images:product_id,name'])->where('name', 'LIKE', '%'.$request->search.'%')->orderByDesc('updated_at')->get();
                // return view('productStore', compact('products','products_newest','products_sell','categorys'));
                return view('productStore', ['category_id' => -1, 'search' => $request->search]);
            }
        }
    } 
     
    public function register(Request $request)
    {
        $tmp = Users::create([
            'name' => $request['name'] ,
            'email' => $request['email'],
            'phone' => $request['phone'],
            'gender' =>$request['gender'],
            'roles'=> 0,
            'address' => $request['address'],
            'firstname' => $request['firstname'],
            'lastname' => $request['lastname'],
            'password' => \Hash::make($request['password']),
        ]);
        echo "Sign Up Success";
        return $tmp;
    }
}
