<?php

namespace App\Models;

use App\Order;
use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    protected $fillable = [
        'name', 'id',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
