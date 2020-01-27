<?php

use Faker\Provider\Company;

class KindProdiver extends Company
{
    protected static $kinds = [
        'Ferreteria',
        'Papeleria',
        'Farmacia',
        'Abarrotes',
        'Tienda',
        'Vinateria'
    ];

    public function kind()
    {
        return static::randomElement(static::$kinds);
    }
}