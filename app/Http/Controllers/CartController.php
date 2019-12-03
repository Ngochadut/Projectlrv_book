<?php

namespace App\Http\Controllers;

use App\Orders;
use App\Product;
use App\Users;
use Exception;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    
    public function waitOrder(){
        return view('user.wait_Order');
    }
    
    public function confirmed(){
        return view('user.confirmed_order');
    }

    public function apiAddToCart($id, Request $request) {
        try {
            $num = $request->quantity;
            $cart = Auth::user()->temporatyOrder;
            $cart_array = unserialize($cart);
            if($cart_array == null){
                $cart_array = [];
                array_push($cart_array, [$id, $num]);
                $cart_JSON = serialize($cart_array);
                Auth::user()->temporatyOrder = $cart_JSON;
                if(Auth::user()->save()) {
                    return 1;
                }
                
                return "Add to Cart failured";
            }
            else {
                foreach( $cart_array as $key => $value ) {
                    if($value[0] == $id) {
                        $value[1] += $num;
                        if($value[1] > 5) {
                            $value[1] = 5;
                        }
                        else if($value[1] < 1) {
                            $value[1] = 1;
                        }
                        $cart_array[$key] = $value;
                        $cart_JSON = serialize($cart_array);

                        Auth::user()->temporatyOrder = $cart_JSON;
                        if(Auth::user()->save()) {
                            return $value[1];
                        }
                        return "Add to Cart failured";
                    }
                }
                
                array_push($cart_array, [$id, $num]);
                $cart_JSON = serialize($cart_array);
                Auth::user()->temporatyOrder = $cart_JSON;
                if(Auth::user()->save()) {
                    return 1;
                }
                return "Add to Cart failured";
            }
        }
        catch(Exception $ex) {
            return $ex;
        }
        return ;
    }

    public function remove($id){
        $cart = Auth::user()->temporatyOrder;
        $cart_array = unserialize($cart);
        foreach($cart_array as $key => $value ){
            if($value[0] == $id){
                $value[1]--;
            }
            $cart_JSON = serialize($cart_array);
            Auth::user()->temporatyOrder = $cart_JSON;
            if(Auth::user()->save()) {
                return "Delete to Succecss";
            }
            return "Add to Cart failured";
        }
        return;
    }
    public function delete($id){
        $cart = Auth::user()->temporatyOrder;
        $cart_array = unserialize($cart);
        foreach($cart_array as $key => $value ){
            if($value[0] == $id){
                unset($cart_array[$key]);
                $cart_JSON = serialize($cart_array);
                Auth::user()->temporatyOrder = $cart_JSON;
                if(Auth::user()->save()) {
                    return "Delete to Succecss";
                }
            }
        }
        return "Delete Product failured";
    }

    public function cart(){
        $cart = Auth::user()->temporatyOrder;
        $cart_array = unserialize($cart);
        if($cart_array == null){
            return view('user.emptyCart');
        }
        else{
            $user = Auth::user();
            $products = [];
            $total = 0;
            foreach( $cart_array as $key => $value ){
                $id = $value[0];
                $product = Product::find($id);
                $productTotal = $product->price * $value[1];
                $product->quaility = $value[1];
                $product->productTotal = $productTotal;
                $total += $productTotal;
                array_push($products, $product);
            }

            return view('checkOut',compact('products', 'total','user'));
        }
    }
}