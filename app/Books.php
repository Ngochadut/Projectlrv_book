<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use app\Categories;
use app\Rattings;

class Books extends Model
{
    protected $table = "books";

    protected $fillable = [
    	'name','id', 'img', 'author', 'describes', 'price', 'number', 'category_id'
    ];

    public function Categories (){
    	return $this->belongsTo(Categories::class);
    }

    public function Ratting (){
    	return $this->hasMany(Rattings::class);
    }


}
