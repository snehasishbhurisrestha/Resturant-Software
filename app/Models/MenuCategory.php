<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class MenuCategory extends Model implements HasMedia
{
    use InteractsWithMedia;
    
    protected $fillable = [
        'restaurant_id','name','online_display_name','category_group','status'
    ];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function items()
    {
        return $this->hasMany(MenuItem::class,'category_id');
    }
}
