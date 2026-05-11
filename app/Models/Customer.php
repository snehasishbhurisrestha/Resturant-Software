<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'restaurant_id',
        'name',
        'phone',
        'email',
        'dob',
        'marital_status',
        'notes'
    ];

    // ================================
    // 🔗 RELATIONSHIPS
    // ================================

    // 🏢 Belongs to Restaurant
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    // 🪑 Customer Sessions (VERY IMPORTANT)
    public function sessions()
    {
        return $this->hasMany(CustomerSession::class);
    }

    // 🧾 Orders (through sessions OR direct)
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    // ================================
    // 🔥 HELPER METHODS (VERY USEFUL)
    // ================================

    // 💰 Total Spent
    public function getTotalSpentAttribute()
    {
        return $this->sessions()->sum('used_amount');
    }

    // 📊 Total Visits
    public function getTotalVisitsAttribute()
    {
        return $this->sessions()->count();
    }

    // 💰 Total Cover
    public function getTotalCoverAttribute()
    {
        return $this->sessions()->sum('entry_fee');
    }
}