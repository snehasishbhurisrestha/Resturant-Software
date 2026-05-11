<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'restaurant_id',
        'section_id',
        'table_id',
        'order_type',
        'created_by',
        'status',
        'my_amount',
        'subtotal',
        'tax',
        'tax_amount',
        'discount',
        'discount_amount',
        'grand_total',
        'round_off',
        'payment',
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function table()
    {
        return $this->belongsTo(Table::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class,'created_by');
    }

    public function session()
    {
        return $this->belongsTo(CustomerSession::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
