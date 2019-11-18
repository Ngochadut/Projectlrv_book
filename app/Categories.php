<?php

namespace App;
use App\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categories extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    
    protected $table = "categories";

    protected $fillable = [
    	'name','parent_id','describes','create_by','update_by','delete_at'
    ];
    
    public function Product(){
    	return $this->hasMany(Product::class,'category_id','id');
    }
    public function parent_category(){
    	return $this->belongsTo(Parent_category::class,'parent_id','id');
    }
}
