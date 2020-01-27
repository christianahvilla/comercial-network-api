<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{

    protected $keyType = 'string';

    protected $fillable = [
        'id', 'user_id', 'name', 'image', 'email', 'phone', 'web_page', 'kind', 'enabled', 'street', 'zip_code', 'neighborhood', 'city', 'long', 'lat', 'products_limit', 'image_limit'
    ];

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function images(){
        return $this->hasMany(Image::class);
    }

    public function user(){
        return $this->belongsTo(Shop::class);
    }
}
