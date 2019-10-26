<?php

namespace App\Models;

use App\Models\Book;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Ratting extends Model
{
    protected $fillable = [
        'name',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

}
