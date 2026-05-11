<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Printer extends Model
{
    protected $fillable = [
        'restaurant_id',
        'name',
        'ip_address',
        'port',
        'type',
        'status'
    ];
}