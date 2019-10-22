<?php

namespace App;
use App\Order;

use Illuminate\Database\Eloquent\Model;

class Detail_order extends Model
{
    protected $table = "detail_orders";

    protected $fillable = [
    	'name','id'
    ];

    public function Order(){
    	return $this->belongsTo(Order::class);
    }
}
