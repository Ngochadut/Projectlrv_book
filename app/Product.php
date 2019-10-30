<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\DetailOrders;
use App\Category;
class Product extends Model
{
    protected $table = "product";
    protected $fillable = [
    	'name', 'id_img', 'describes', 'published', 'author', 'price', 'maket_price','cover_type','num_page','SKU','size','number','category_id','create_by','update_by','delete_at'
    ];
    public function orderdetail(){
        return $this->hasMany(DetailOrders::class, 'product_id', 'id');
    }
    
    public function Category(){
        return $this->belongsTo(Category::class);
    }
    public function Order(){
        return $this->belongsToMany(Order::class, 'detail_order', 'product_id', 'order_id');
    }
    public function ratings(){
        return $this->hasMany(Rating::class)->orderBy('created_at','DESC');
    }
}
