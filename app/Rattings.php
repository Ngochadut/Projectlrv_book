<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Books;
class Rattings extends Model
{
    protected $table = "rattings";

    protected $fillable = [
    	'name',
    ];

    public function Users(){
    	return $this->belongsTo(User::class);
    }
    public function Books (){
    	return $this->belongsTo(Books::class);
    }

}
