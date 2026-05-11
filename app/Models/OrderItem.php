<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id',
        'menu_item_id',
        'item_name',
        'quantity',
        'price',
        'tax',
        'discount',
        'line_total',
        'is_complimentary',
        'is_kot_printed',
        'status',
        'note'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function item()
    {
        return $this->belongsTo(MenuItem::class,'menu_item_id');
    }

    public function addons()
    {
        return $this->hasMany(OrderItemAddon::class);
    }
}
