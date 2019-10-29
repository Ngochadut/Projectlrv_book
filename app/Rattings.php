<?php

namespace App;
use App\User;
use App\Product;
use Illuminate\Database\Eloquent\Model;

class Rattings extends Model
{
    //
    protected $table = "ratings";
    protected $fillable = [
    	'user_id', 'product_id', 'star_number', 'comment','create_by','update_by','delete_flag'
    ];
	public function user(){
		return $this->belongsTo(User::class);
	}
	public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
