<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Parent_category extends Model
{
    use SoftDeletes;
    
    protected $table = "parent_category";

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'id', 'name','create_by','update_by','delete_at'
    ];
    
    public function product(){
        return $this->hasMany(Product::class, 'product_id', 'id');
    }// ??
}
