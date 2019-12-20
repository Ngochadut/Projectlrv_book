<?php

namespace App\Http\Controllers;

use App\Orders;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function order(){
		$orders = Orders::with(['orderdetail'])->where('user_id','=',Auth::user()->id)->get();
		if(!$orders){
			return view('user.emptyCart');
		}
		else{
			return view('user.history_order', compact('historyOder','orders'));
		}
		// if($orders->status === "PENDING" ){
		// 	return view('user.wait_order',compact('orders')); 
		// }
		// else if($orders->status === "CONFIRM" ){
		// 	return view('user.confirmed_order',compact('orders')); 
		// }
		// else if($orders->status === "DELIVERY" ){
		// 	return view('user.delivery');
		// }
		// else if($orders->status === "DONE" ){
		// 	return view('user.emptyCart'); 
		// }
		// else{
		// 	return view('user.emptyCart');
		// }
	}

	public function detail($id){
		$orders = Orders::with(['orderdetail'])->where('user_id','=',Auth::user()->id)->find($id);
		return view('user.order_detail', compact('orders'));
		
	}

	public function cancel(Request $request){
		$order_id = $request->order_id;
		$order = Orders::where('user_id','=',Auth::user()->id)->find($order_id);
		if($order->status === "PENDING"){
			$order->status = "CANCEL";
			$order->save();
		}	
		return redirect('order/checkout');
	}
	
	
}
