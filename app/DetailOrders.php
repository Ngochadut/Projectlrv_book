<?php

namespace App;
use App\Product;
use App\Orders;

use Illuminate\Database\Eloquent\Model;

class DetailOrders extends Model
{
    protected $table = 'detail_orders';
    protected $fillable = [
    	'order_id', 'book_id', 'quantity', 'created_at', 'updated_at'
    ];
    public function order(){
    	return $this->belongsTo(Orders::class,'order_id');
    }
    public function product(){
    	return $this->belongsTo(Product::class,'book_id');
    }
}
