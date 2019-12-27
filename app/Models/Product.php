<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $keyType = 'string';

    protected $fillable = [
        'id', 'category_id', 'name', 'price', 'photo', 'stock'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
