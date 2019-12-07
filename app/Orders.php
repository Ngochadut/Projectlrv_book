<?php

namespace App;
use App\Users;
use App\DetailOrders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Orders extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = "orders";

    protected $fillable = [
    	'id', 'user_id', 'note','status', 'date_purchase', 'create_by','update_by','delete_at'
    ];
    
    public function user(){
        return $this->belongsTo(Users::class, 'user_id', 'id'); 
    }
    
    public function orderdetail(){
        return $this->hasMany(DetailOrders::class, 'order_id', 'id');
    }
}
