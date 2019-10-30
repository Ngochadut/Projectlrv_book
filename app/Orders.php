<?php

namespace App;
use App\Users;
use App\OrderDetail;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = "orders";
    protected $fillable = [
    	'name', 'user_id', 'note', 'date_publise', 'create_by','update_by','delete_at'
    ];
    
    public function user(){
        return $this->belongsTo(Users::class, 'user_id', 'id');
    }
    
    public function orderdetail(){
        return $this->hasMany(OrderDetail::class, 'order_id', 'id');
    }
}
