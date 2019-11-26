<?php

namespace App\Http\Controllers;

use App\Interfaces\AuthRepositoryInterface;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private $authRepository;

    public function _construct(AuthRepositoryInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    /**
    * @OA\Post(
    *   path="/api/login",
    *   summary="Login user",
    *   @OA\Parameter(
    *       name="email",
    *       in="query",
    *       description="Email",
    *       required=true,
    *   ),
    *   @OA\Parameter(
    *       name="Password",
    *       in="query",
    *       description="Password",
    *       required=true,
    *   ),
    *   @OA\Response(
    *       response=200,
    *       description="Login user"
    *   ),
    *   @OA\Response(
    *       response="500",
    *       description="Something when wrong"
    *    ),
    *   @OA\Response(
    *       response="401",
    *       description="Unauthorized"
    *    )
    * )
    */

    public function login(Login $login)
    {
        return $this->authRepository->login($login);
    }

    /**
    * @OA\Post(
    *   path="/api/logout",
    *   summary="Logout user",
    *   @OA\Response(
    *       response=200,
    *       description="Logout user"
    *   ),
    *   @OA\Response(
    *       response="500",
    *       description="Something when wrong"
    *    ),
    *   @OA\Response(
    *       response="401",
    *       description="Unauthorized"
    *    )
    * )
    */

    public function logout(Request $request)
    {
        return $this->authRepository->logout($request);
    }
}
