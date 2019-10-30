<?php

namespace App;
use App\Product;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = "categories";

    protected $fillable = [
    	'name','parent_id','describes','create_by','update_by','delete_at'
    ];
    
    public function Product(){
    	return $this->hasMany(Product::class,'category_id','id');
    }
}
