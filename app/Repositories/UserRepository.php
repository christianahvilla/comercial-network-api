<?php

namespace App\Repositories;

use App\Http\Requests\User\UserStore;
use App\Http\Requests\User\UserUpdate;
use App\Models\User;
use App\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function all()
    {
        return User::all(['*']);
    }

    public function getUser($id)
    {
        return User::findOrFail($id);
    }

    public function store(UserStore $user)
    {
        User::create($user->all());
        return 201;
    }

    public function put(UserUpdate $user, $id)
    {
        $user = User::findOrFail($id);
        $user->update($user->all());
        return $user;
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return 204;
    }
}