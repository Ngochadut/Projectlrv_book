<?php

namespace App;
use App\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = "image";

    protected $fillable = [
        'product_id', 'name','create_by','update_by','delete_at'
    ];

    public function product(){
        return $this->belongsTo(Product::class, 'user_id', 'id');
    }
}
