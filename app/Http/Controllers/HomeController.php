<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use App\Books;
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
        $new_books = Books::orderByDesc('updated_at')->take(10)->get();
        return view('welcome',[
            'books' => $new_books
        ]);
    }
    
    
    public function bookStore()
    {
        return view('bookStore');
    }
    
    public function checkOut()
    {
        return view('checkOut');
    }

    public function register(Request $request)
    {
        $tmp = User::create([
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
        // dd(DB::getQueryLog());
        echo "Sign Up Success";
        return $tmp;
    }
}
