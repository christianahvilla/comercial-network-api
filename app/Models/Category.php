<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $primaryKey = 'category_id', $keyType = 'string';

    protected $fillable =[
        'category_id', 'category'
    ];

    public function products(){
        return $this->hasMany(Product::class);
    }
}
