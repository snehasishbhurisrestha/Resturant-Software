<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class MenuItem extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'restaurant_id',
        'category_id',
        'name',
        'short_code',
        'online_display_name',
        'price',
        'description',
        'dietary',
        'status'
    ];

    protected $appends = ['image_link'];

    public function category()
    {
        return $this->belongsTo(MenuCategory::class);
    }

    public function orders()
    {
        return $this->hasMany(OrderItem::class,'menu_item_id');
    }

    public function getImageLinkAttribute()
    {
        $media = $this->getFirstMedia('items');

        return $media ? $media->getUrl() : null;
    }

    public function addons()
    {
        return $this->belongsToMany(
            Addon::class,
            'item_addon_maps',
            'menu_item_id',
            'addon_id'
        );
    }
}
