<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\Login;
use App\Interfaces\AuthRepositoryInterface;
use Illuminate\Http\Request;

/**
*   @OA\Info(
*       description="",
*       version="1.0.0",
*       title="Apartame API",
*   ),
*   @OA\SecurityScheme(
*       securityScheme="bearerAuth",
*       in="header",
*       name="bearerAuth",
*       type="http",
*       scheme="bearer",
*       bearerFormat="JWT",
*   )
 */
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
    *   tags={"Authentication"},
    *   @OA\RequestBody(
    *       @OA\MediaType(
    *           mediaType="application/json",
    *           @OA\Schema(
    *               @OA\Property(
    *                   property="email",
    *                   type="string"
    *               ),
    *               @OA\Property(
    *                   property="password",
    *                   type="string"
    *               ),
    *               example={"email": "mcglynn.emory@example.net", "password": "password"}
    *             )
    *         )
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
    * @OA\Get(
    *   path="/api/auth/logout",
    *   summary="Logout user",
    *   tags={"Authentication"},
    *   security={{"bearerAuth":{}}}, 
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
