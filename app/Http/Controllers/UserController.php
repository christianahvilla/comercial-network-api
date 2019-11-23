<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserStore;
use App\Http\Requests\User\UserUpdate;
use App\Interfaces\UserRepositoryInterface;

/**
* @OA\Info(title="API Usuarios", version="1.0")
*/

class UserController extends Controller
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
    * @OA\Get(
    *     path="/api/user",
    *     summary="Display users",
    *     @OA\Response(
    *         response=200,
    *         description="Display all users"
    *     ),
    *     @OA\Response(
    *         response="500",
    *         description="Something when wrong"
    *     )
    * )
    */

    public function all()
    {
        return $this->userRepository->all();
    }

    /**
    * @OA\Get(
    *     path="/api/user/{id}",
    *     summary="Display user",
    *     @OA\Response(
    *         response=200,
    *         description="Display specific user"
    *     ),
    *     @OA\Response(
    *         response="500",
    *         description="Something when wrong"
    *     )
    * )
    */

    public function getUser($id)
    {
        return $this->userRepository->getUser($id);
    }

    /**
    * @OA\Post(
    *   path="/api/users",
    *   summary="Create user",
    *   @OA\Parameter(
    *       name="firstname",
    *       in="query",
    *       description="Your first name",
    *       required=true,
    *   ),
    *   @OA\Parameter(
    *       name="lastname",
    *       in="query",
    *       description="Your last name",
    *       required=true,
    *   ),
    *   @OA\Response(
    *       response=200,
    *       description="Create user"
    *   ),
    *   @OA\Response(
    *       response="500",
    *       description="Something when wrong"
    *    )
    * )
    */

    public function store(UserStore $user)
    {
        return $this->userRepository->strore($user);
    }

    /**
    * @OA\Put(
    *     path="/api/users/{id}",
    *     summary="Update user",
    *     @OA\Response(
    *         response=201,
    *         description="Update user"
    *     ),
    *     @OA\Response(
    *         response="500",
    *         description="Something when wrong"
    *     )
    * )
    */

    public function put(UserUpdate $user, $id)
    {
        return $this->userRepository->put($user, $id);
    }

    /**
    * @OA\Delete(
    *     path="/api/users/{id}",
    *     summary="Delete user",
    *     @OA\Response(
    *         response=204,
    *         description="Delete user"
    *     ),
    *     @OA\Response(
    *         response="500",
    *         description="Something when wrong"
    *     )
    * )
    */

    public function delete($id)
    {
        return $this->userRepository->delete($id);
    }
}
