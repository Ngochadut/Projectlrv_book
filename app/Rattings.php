<?php

namespace App;
use App\Users;
use App\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rattings extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = "rattings";

    protected $fillable = [
    	'user_id', 'product_id', 'star_number', 'comment','create_by','update_by','delete_at'
    ];

	public function user(){
		return $this->belongsTo(Users::class);
    }
    
	public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
