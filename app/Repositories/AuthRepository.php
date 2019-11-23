<?php

namespace App\Repositories;

use App\Http\Requests\Auth\Login;
use App\Interfaces\AuthRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class AuthRepository implements AuthRepositoryInterface
{
    public function login(Login $login)
    {
        if(Auth::attempt($login))
        {
            $user = $login->user();

            $tokenResult = $user->createToken('Personal Access Token');
            $token = $tokenResult->token;

            $token->save();

            return response()->json([
                'access_token' => $tokenResult->accessToken,
                'token_type' => 'Bearer',
                'name' => $user->name,
                'role' => $user->role,
            ]);
        }

        return response()->json([
            'message' => 'Unauthorized'
        ], 401);

    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();

        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

}