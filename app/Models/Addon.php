<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Addon extends Model
{
    protected $fillable = [
        'restaurant_id',
        'name',
        'price',
        'status'
    ];

    public function items()
    {
        return $this->belongsToMany(
            MenuItem::class,
            'item_addon_maps',
            'addon_id',
            'menu_item_id'
        );
    }
}