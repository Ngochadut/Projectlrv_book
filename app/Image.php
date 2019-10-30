<?php

namespace App;
use App\Product;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //
    protected $table = "image";
    protected $fillable = [
         'product_id', 'name','create_by','update_by','delete_at'
    ];
    public function product(){
        return $this->belongsTo(Product::class, 'user_id', 'id');
    }
}
