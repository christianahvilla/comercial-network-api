<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserStore;
use App\Http\Requests\User\UserUpdate;
use App\Interfaces\UserRepositoryInterface;

class UserController extends Controller
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
    * @OA\Get(
    *     path="/api/manage/users",
    *     summary="Display users",
    *     tags={"Manage"},
    *     security={{"bearerAuth":{}}}, 
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

    public function index()
    {
        return $this->userRepository->index();
    }

    /**
    * @OA\Get(
    *     path="/api/manage/users/{id}",
    *     summary="Display user",
    *     tags={"Manage"},
    *     security={{"bearerAuth":{}}}, 
    *     @OA\Parameter(
    *       name="id",
    *       in="path",
    *       required=true,
    *     ),
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

    public function show($id)
    {
        return $this->userRepository->show($id);
    }

    /**
    * @OA\Post(
    *   path="/api/manage/users",
    *   summary="Create user",
    *   tags={"Manage"},
    *   security={{"bearerAuth":{}}}, 
    *   @OA\RequestBody(
    *     @OA\MediaType(
    *         mediaType="application/json",
    *         @OA\Schema(
    *             @OA\Property(
    *                 property="id",
    *                 type="string"
    *             ),
    *             @OA\Property(
    *                 property="name",
    *                 type="string"
    *             ),
    *             @OA\Property(
    *                 property="last_name",
    *                 type="string"
    *             ),
    *             @OA\Property(
    *                 property="email",
    *                 type="string"
    *             ),
    *             @OA\Property(
    *                 property="phone",
    *                 type="string"
    *             ),
    *             @OA\Property(
    *                 property="role",
    *                 type="string"
    *             ),
    *             @OA\Property(
    *                 property="password",
    *                 type="string"
    *             ),
    *             example=
    *             {
    *                 "id": "4ed6914e-eff9-3b61-b0b0-6498f77a35f6",
    *                 "name": "Javier",
    *                 "last_name": "Gutierrez Mancillas",
    *                 "email": "jgutierrez@net.com",
    *                 "phone": "5555555555",
    *                 "role": "Admin", 
    *                 "password": "password",
    *             }
    *           )
    *       )
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
        return $this->userRepository->store($user);
    }

    /**
    * @OA\Put(
    *     path="/api/manage/users/{id}",
    *     summary="Update user",
    *     tags={"Manage"},
    *     security={{"bearerAuth":{}}}, 
    *     @OA\Parameter(
    *       name="id",
    *       in="path",
    *       required=true,
    *     ),
    *     @OA\RequestBody(
    *       @OA\MediaType(
    *           mediaType="application/json",
    *           @OA\Schema(
    *               @OA\Property(
    *                   property="id",
    *                   type="string"
    *               ),
    *               @OA\Property(
    *                   property="name",
    *                   type="string"
    *               ),
    *               @OA\Property(
    *                   property="last_name",
    *                   type="string"
    *               ),
    *               @OA\Property(
    *                   property="email",
    *                   type="string"
    *               ),
    *               @OA\Property(
    *                   property="phone",
    *                   type="string"
    *               ),
    *               @OA\Property(
    *                   property="role",
    *                   type="string"
    *               ),
    *               @OA\Property(
    *                   property="password",
    *                   type="string"
    *               ),
    *               example=
    *               {
    *                   "id": "4ed6914e-eff9-3b61-b0b0-6498f77a35f6",
    *                   "name": "Javier",
    *                   "last_name": "Gutierrez Mancillas",
    *                   "email": "jgutierrez@net.com",
    *                   "phone": "5555555555",
    *                   "role": "Admin", 
    *                   "password": "password",
    *               }
    *             )
    *         )
    *     ),
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
    *     path="/api/manage/users/{id}",
    *     summary="Delete user",
    *     tags={"Manage"},
    *     security={{"bearerAuth":{}}},
    *     @OA\Parameter(
    *       name="id",
    *       in="path",
    *       required=true,
    *     ), 
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
