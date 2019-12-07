<?php

namespace App;
use App\Product;
use App\Orders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailOrders extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'detail_orders';

    protected $fillable = [
    	'id','order_id', 'product_id','total_price', 'quantity', 'created_at', 'updated_at','delete_at'
    ];
    public function order(){
    	return $this->belongsTo(Orders::class,'order_id');
    }
    public function product(){
    	return $this->belongsTo(Product::class,'product_id');
    }
    
}
