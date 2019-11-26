<?php

use Faker\Provider\Company;

class RoleProdiver extends Company
{
    protected static $roles = [
        'Admin',
        'Merchant',
        'Customer',
        'Employee'
    ];

    public function role()
    {
        return static::randomElement(static::$roles);
    }
}