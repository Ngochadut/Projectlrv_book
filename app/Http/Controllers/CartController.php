<?php
namespace App\Http\Controllers;

use App\DetailOrders;
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
    public function __construct(){
        $this->middleware('auth');
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
                return redirect()->back()->with(['class' => 'success', 'message' => 'Delete success.']);;
            }
            return "delete wrong";
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
                    return "Đã xóa thành công !!";
                }
            }
        }
        return "Xóa thất bại";
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

    public function submit_cart(Request $request){
        $cart = Auth::user()->temporatyOrder;
        $cart_array = unserialize($cart);

        $order = new Orders();
        $order->user_id = Auth::user()->id;
        $order->note = "note";
        $order->status = "PENDING";
        $order->date_purchase = date("Y/m/d H:i:s");
        $order->created_at = now();
        $order->updated_at = now();
        if($order->save()) {
            foreach($cart_array as $cart) {
                $order_detail = new DetailOrders();
                $id = $cart[0];
                $product = Product::find($id);
                $productTotal = $product->price * $cart[1];
                $order_detail->order_id = $order->id;
                $order_detail->product_id = $cart[0];
                $order_detail->quantity = $cart[1];
                $order_detail->total_price = $productTotal;
                $order_detail->create_by = Auth::user()->name;
                $order_detail->update_by = Auth::user()->name;
                $order_detail->save();
            }
        } 
        Auth::user()->temporatyOrder = null;
        Auth::user()->save();
        if($request->password === null){
			$data = $request->only('name', 'phone', 'firstname', 'lastname', 'address');
		}
		else{
			$data = $request->only('phone', 'firstname', 'lastname', 'address', 'password');
			$data['password'] = bcrypt($data['password']);
		}
		$user = Users::where('email',$request->email);
		$user->update($data);
        return redirect('order/checkout');
    }
    public function history(){ 
        $user_id = Auth::user()->id;
        $historyOder = Orders::where(['user_id'=>$user_id])->with('orderdetail')->get();
		return view('user.history_order',compact('historyOder'));
	}

} 
