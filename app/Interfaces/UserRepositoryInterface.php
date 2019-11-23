<?php

namespace App\Interfaces;

use App\Http\Requests\User\UserStore;
use App\Http\Requests\User\UserUpdate;


interface UserRepositoryInterface 
{

    public function all();

    public function getUser($id);

    public function store(UserStore $user);

    public function put(UserUpdate $user, $id);

    public function delete($id);

}