<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    protected $fillable = [
        'restaurant_id','section_id','table_number','capacity','status'
    ];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function sessions()
    {
        return $this->hasMany(CustomerSession::class);
    }

    public function activeSession()
    {
        return $this->hasOne(CustomerSession::class)
            ->where('status', 'active');
    }
}
