<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{

    protected $keyType = 'string';

    use HasApiTokens, Notifiable;

    protected $fillable = [
        'id', 'name', 'last_name', 'email', 'phone', 'role', 'password'
    ];

    public $incrementing = false;

    protected $hidden = [
        'password'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function shops(){
        return $this->hasMany(Shop::class);
    }
}
