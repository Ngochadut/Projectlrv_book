<?php

namespace App;
use App\User;
use App\OrderDetail;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = "orders";
    protected $fillable = [
    	'name', 'user_id', 'note', 'date_publise', 'create_by','update_by','delete_flag'
    ];
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
    public function orderdetail(){
        return $this->hasMany(OrderDetail::class, 'order_id', 'id');
    }
}
