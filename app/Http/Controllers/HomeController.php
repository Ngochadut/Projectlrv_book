<?php

namespace App\Http\Controllers;

use App\Image;
use DB;
use App\Users;
use App\Product;
use Illuminate\Http\Request;

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
    public function index()
    {
        $products_newest = Product::with(['images:product_id,name'])->orderByDesc('updated_at')->take(3)->get();
        $products = Product::with(['images:product_id,name'])->orderByDesc('updated_at')->take(10)->get();
        return view('welcome', compact('products','products_newest'));
    
    }
    
    
    
       
    public function checkOut()
    {
        return view('checkOut');
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
        // dd($tmp);
    
        echo "Sign Up Success";
        return $tmp;
    }
}
