<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable =[
        'id', 'shop_id', 'url'
    ];

    public function user(){
        return $this->belongsTo(Shop::class);
    }
}
