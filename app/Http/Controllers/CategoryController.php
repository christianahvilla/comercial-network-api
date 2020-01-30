<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\CategoryStore;
use App\Http\Requests\Category\CategoryUpdate;
use App\Interfaces\CategoryRepositoryInterface;

class CategoryController extends Controller
{
    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
    * @OA\Get(
    *     path="/api/manage/categories",
    *     summary="Display categories",
    *     tags={"Categories"},
    *     security={{"bearerAuth":{}}}, 
    *     @OA\Response(
    *         response=200,
    *         description="Display all categories"
    *     ),
    *     @OA\Response(
    *         response="500",
    *         description="Something when wrong"
    *     )
    * )
    */

    public function index()
    {
        return $this->categoryRepository->index();
    }

    /**
    * @OA\Post(
    *     path="/api/manage/categories",
    *     summary="Store category",
    *     tags={"Categories"},
    *     security={{"bearerAuth":{}}}, 
    *     @OA\RequestBody(
    *       @OA\MediaType(
    *           mediaType="application/json",
    *           @OA\Schema(
    *               @OA\Property(
    *                   property="id",
    *                   type="string"
    *               ),
    *               @OA\Property(
    *                   property="category",
    *                   type="string"
    *               ),
    *               example=
    *               {
    *                   "id": "4ed6914e-eff9-3b61-b0b0-6498f77a3500",
    *                   "category": "category"
    *               }
    *             )
    *         )
    *     ),
    *     @OA\Response(
    *         response=201,
    *         description="Store category"
    *     ),
    *     @OA\Response(
    *         response="500",
    *         description="Something when wrong"
    *     )
    * )
    */ 

    public function store(CategoryStore $category)
    {
        return $this->categoryRepository->store($category);
    }

    /**
    * @OA\Get(
    *     path="/api/manage/categories/{id}",
    *     summary="Display category",
    *     tags={"Categories"},
    *     security={{"bearerAuth":{}}},
    *     @OA\Parameter(
    *       name="id",
    *       in="path",
    *       required=true,
    *     ),
    *     @OA\Response(
    *         response=200,
    *         description="Display an specific category"
    *     ),
    *     @OA\Response(
    *         response="500",
    *         description="Something when wrong"
    *     )
    * )
    */

    public function show($id)
    {
        return $this->categoryRepository->show($id);
    }

    /**
    * @OA\Put(
    *     path="/api/manage/categories/{id}",
    *     summary="Update category",
    *     tags={"Categories"},
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
    *                   property="category",
    *                   type="string"
    *               ),
    *               example=
    *               {
    *                   "id": "4ed6914e-eff9-3b61-b0b0-6498f77a3500",
    *                   "category": "category"
    *               }
    *             )
    *         )
    *     ),
    *     @OA\Response(
    *         response=201,
    *         description="Update category"
    *     ),
    *     @OA\Response(
    *         response="500",
    *         description="Something when wrong"
    *     )
    * )
    */ 

    public function update(CategoryUpdate $category, $id)
    {
        return $this->categoryRepository->update($category,$id);
    }

    /**
    * @OA\Delete(
    *     path="/api/manage/categories/{id}",
    *     summary="Delete category",
    *     tags={"Categories"},
    *     security={{"bearerAuth":{}}},
    *     @OA\Parameter(
    *       name="id",
    *       in="path",
    *       required=true,
    *     ), 
    *     @OA\Response(
    *         response=204,
    *         description="Delete category"
    *     ),
    *     @OA\Response(
    *         response="500",
    *         description="Something when wrong"
    *     )
    * )
    */

    public function destroy($id)
    {
        return $this->categoryRepository->destroy($id);
    }
}
