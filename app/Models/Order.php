<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $casts = [
        'billing_address' => 'collection',
        'shipping_address' => 'collection',
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
