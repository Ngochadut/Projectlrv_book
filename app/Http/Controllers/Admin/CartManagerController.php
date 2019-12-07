<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Orders;
use Exception;
use Illuminate\Support\Facades\Auth;

class CartManagerController extends Controller
{
    public function index(){
        $orders = Orders::with(['orderdetail'])->get();
        return view('admin.cartManager.index',compact('orders'));
    }

    public function updateStatus($order_id, Request $request) {
        dd($request->status);
        
        dd('Ngoc Ha');
        return $order_id;
    }
}  
