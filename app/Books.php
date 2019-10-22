<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use app\Categories;
use app\Rattings;

class Books extends Model
{
    protected $table = "books";

    protected $fillable = [
    	'name','id'
    ];

    public function Categories (){
    	return $this->belongsTo(Categories::class);
    }

    public function Ratting (){
    	return $this->hasMany(Rattings::class);
    }


}
