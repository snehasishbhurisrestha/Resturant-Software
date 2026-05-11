<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemAddonMap extends Model
{
    protected $fillable = [
        'menu_item_id',
        'addon_id'
    ];
}