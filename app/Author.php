<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = "author";

    protected $fillable = [
        'product_id', 'name','img','address','describes','born','died','create_by','update_by','delete_at'
    ];

    public function product(){
        return $this->hasMany(Product::class, 'user_id', 'id');
    }
}
