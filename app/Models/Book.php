<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Ratting;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'name', 'id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function rattings()
    {
        return $this->hasMany(Ratting::class);
    }

}
