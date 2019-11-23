<?php

namespace App\Interfaces;

use App\Http\Requests\Auth\Login;
use Illuminate\Http\Request;

interface AuthRepositoryInterface 
{
    public function login(Login $login);

    public function logout(Request $request);
}