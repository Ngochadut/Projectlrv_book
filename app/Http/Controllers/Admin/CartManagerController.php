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

    public function updateStatus(Request $request) {
        $order =  Orders::find($request->order_id);
        $order->status = $request->status;
        if($order->save()){
            return 'Updata succeed';
        }
        else{
            return "False";
        }       
    }
}  
