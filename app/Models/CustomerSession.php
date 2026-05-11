<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerSession extends Model
{
    protected $fillable = [
        'customer_id',
        'customer_name',
        'customer_phone',
        'restaurant_id',
        'entry_fee',
        'used_amount',
        'remaining_amount',
        'table_id',
        'status',
        'qr_code',
        'created_by',
    ];

    protected $casts = [
        'entry_fee' => 'decimal:2',
        'used_amount' => 'decimal:2',
        'remaining_amount' => 'decimal:2',
    ];

    // Relationships
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function table()
    {
        return $this->belongsTo(Table::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
