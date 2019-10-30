<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parent_category extends Model
{
    protected $table = "parent_category";

    protected $fillable = [
        'id', 'name'
    ];
    
    public function product(){
        return $this->hasMany(Product::class, 'product_id', 'id');
    }// ??
}
