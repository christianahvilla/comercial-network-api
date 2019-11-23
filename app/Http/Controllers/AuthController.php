<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\Login;
use App\Interfaces\AuthRepositoryInterface;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private $authRepository;

    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    /**
    * @OA\Post(
    *   path="/api/auth/login",
    *   summary="Login user",
    *   @OA\RequestBody(
    *       @OA\MediaType(
    *           mediaType="application/json",
    *           @OA\Schema(
    *               required={"email", "password"},
    *               @OA\Property(
    *                   property="email",
    *                   type="string",
    *               ),
    *               @OA\Property(
    *                   property="password",
    *                   type="string",
    *               ),
    *               example={"email": "christianahvilla@gmail.com", "password": "13121474"}
    *           )
    *       )
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
