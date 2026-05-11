<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItemAddon extends Model
{
    protected $fillable = [
        'order_item_id',
        'addon_id',
        'name',
        'price',
        'qty',
        'total'
    ];

    public function orderItem()
    {
        return $this->belongsTo(OrderItem::class);
    }
}