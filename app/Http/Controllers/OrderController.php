<?php

namespace App\Http\Controllers;

use App\Orders;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function order(){
		$orders = Orders::with(['orderdetail'])->where('user_id','=',Auth::user()->id)->first();
		if($orders->status === "PENDING" ){
			return view('user.wait_order',compact('orders'));
		}
		else if($orders->status === "CONFIRM" ){
			return view('user.confirmed_order',compact('orders')); 
		}
		else if($orders->status === "DELIVERY" ){
			return view('user.delivery');
		}
		else if($orders->status === "DONE" ){
			return view(''); 
		}
		else if($orders->status === "" ){
			return view('checkOut');
		}
		else {
			return view('user.emptyCart');
		}
	}
	
}
