<?php

namespace App\Models;

use App\Models\DetailOrder;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'name', 'id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function detailOrders()
    {
        return $this->hasMany(DetailOrder::class);
    }

}
