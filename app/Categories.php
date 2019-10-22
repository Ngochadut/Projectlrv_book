<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Books;

class Categories extends Model
{
    protected $table = "categories";

    protected $fillable = [
    	'name','id'
    ];

    public function Books(){
    	return $this->hasMany(Books::class);
    }
}
