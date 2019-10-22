<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Detail_order;

class Order extends Model
{
    protected $table = "orders";

    protected $fillable = [
    	'name','id'
    ];

    public function Users(){
    	return $this->belongsTo(User::class);
    }
    
    public function detail_order(){
    	return $this->hasMany(Detail_order::class);
    }
    
    
}
