<?php

namespace App\Repositories;

use App\Http\Requests\User\UserStore;
use App\Http\Requests\User\UserUpdate;
use App\Models\User;
use App\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function index()
    {
        return User::where('role', '<>', 'customer')->where('role', '<>', 'employee')->get();
    }

    public function show($id)
    {
        return User::findOrFail($id);
    }

    public function store(UserStore $user)
    {
        $newUser = new User([
            'id' => $user->id,
            'password' => bcrypt($user->password),
            'name' => $user->name,
            'last_name' => $user->last_name,
            'email' => $user->email,
            'phone' => $user->phone,
            'role' => $user->role
        ]);
        $newUser->save();
        return $newUser;
    }

    public function put(UserUpdate $user, $id)
    {
        $oldUser = User::findOrFail($id);

        $oldUser->password = bcrypt($user->password);
        $oldUser->name = $user->name;
        $oldUser->last_name = $user->last_name;
        $oldUser->email = $user->email;
        $oldUser->phone = $user->phone;
        $oldUser->role = $user->role;

        $oldUser->save();
        return $oldUser;
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return $user;
    }
}