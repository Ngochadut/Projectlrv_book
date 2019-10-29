<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Author extends Model
{
    protected $table = "author";
    protected $fillable = [
         'product_id', 'name','img','address','describes','born','died','create_by','update_by','delete_flag'
    ];
    public function product(){
        return $this->hasMany(Product::class, 'user_id', 'id');
    }
}
