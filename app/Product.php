<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\DetailOrders;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = "product";

    protected $fillable = [
    	'name', 'id_img', 'describes', 'publisher', 'author_id', 'price', 'maket_price','cover_type','num_page','SKU','size','number','category_id','create_by','update_by','delete_at'
    ];

    public function orderdetail(){
        return $this->hasMany(DetailOrders::class, 'product_id', 'id');
    }
    
    public function Category(){
        return $this->belongsTo(Categories::class, 'category_id','id');
    }
    public function Author(){
        return $this->belongsTo(Author::class, 'author_id','id');
    } 

    public function Order(){
        return $this->belongsToMany(Order::class, 'detail_order', 'product_id', 'order_id');
    }

    public function ratings(){
        return $this->hasMany(Rating::class)->orderBy('created_at','DESC');
    }
    
    public function images(){
        return $this->hasMany(Image::class,'product_id', 'id');
    }
    //orm
    
    // public function scopeWithImages($query)
    // {
    //     $query->addSubSelect('img_name', Image::select('name')
    //         ->whereColumn('procduct_id', 'product.id')
    //         ->latest()
    //     )->with('images');
    // }
}
