<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'product_id', $keyType = 'string';

    protected $fillable = [
        'product_id', 'category_id', 'name', 'price', 'photo', 'stock'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
