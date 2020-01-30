<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\ProductStore;
use App\Http\Requests\Product\ProductUpdate;

use App\Interfaces\ProductRepositoryInterface;

class ProductController extends Controller
{
    private $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
    * @OA\Get(
    *     path="/api/manage/products",
    *     summary="Display products",
    *     tags={"Products"},
    *     security={{"bearerAuth":{}}}, 
    *     @OA\Response(
    *         response=200,
    *         description="Display all products"
    *     ),
    *     @OA\Response(
    *         response="500",
    *         description="Something when wrong"
    *     )
    * )
    */

    public function index()
    {
        return $this->productRepository->index();
    }

    /**
    * @OA\Post(
    *   path="/api/manage/products",
    *   summary="Create product",
    *   tags={"Products"},
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
    *                 property="category_id",
    *                 type="string"
    *             ),
    *             @OA\Property(
    *                 property="name",
    *                 type="string"
    *             ),
    *             @OA\Property(
    *                 property="price",
    *                 type="decimal"
    *             ),
    *             @OA\Property(
    *                 property="image",
    *                 type="string"
    *             ),
    *             @OA\Property(
    *                 property="stock",
    *                 type="integer"
    *             ),
    *             example=
    *             {
    *                 "id": "4ed6914e-eff9-3b61-b0b0-6498f77a35f8",
    *                 "shop_id": "4ed6914e-eff9-3b61-b0b0-6498f77a35f0",
    *                 "category_id": "4ed69141-eff9-3b61-b0b0-6498f77a35f0",
    *                 "name": "Chetos",
    *                 "image": "http://marioruizmadrigal.com/blog/wp-content/uploads/2019/08/chetos-flamin-hot.jpg",
    *                 "price": "8",
    *                 "stock": "50",
    *             }
    *           )
    *       )
    *   ),
    *   @OA\Response(
    *       response=200,
    *       description="Create product"
    *   ),
    *   @OA\Response(
    *       response="500",
    *       description="Something when wrong"
    *    )
    * )
    */

    public function store(ProductStore $product)
    {
        return $this->productRepository->store($product);
    }

    /**
    * @OA\Get(
    *     path="/api/manage/products/{id}",
    *     summary="Display product",
    *     tags={"Products"},
    *     security={{"bearerAuth":{}}},
    *     @OA\Parameter(
    *       name="id",
    *       in="path",
    *       required=true,
    *     ),
    *     @OA\Response(
    *         response=200,
    *         description="Display an specific product"
    *     ),
    *     @OA\Response(
    *         response="500",
    *         description="Something when wrong"
    *     )
    * )
    */

    public function show($id)
    {
        return $this->productRepository->show($id);
    }

    /**
    * @OA\Put(
    *   path="/api/manage/products/{id}",
    *   summary="Update product",
    *   tags={"Products"},
    *   security={{"bearerAuth":{}}}, 
    *     @OA\Parameter(
    *       name="id",
    *       in="path",
    *       required=true,
    *     ),
    *   @OA\RequestBody(
    *     @OA\MediaType(
    *         mediaType="application/json",
    *         @OA\Schema(
    *             @OA\Property(
    *                 property="id",
    *                 type="string"
    *             ),
    *             @OA\Property(
    *                 property="category_id",
    *                 type="string"
    *             ),
    *             @OA\Property(
    *                 property="name",
    *                 type="string"
    *             ),
    *             @OA\Property(
    *                 property="price",
    *                 type="decimal"
    *             ),
    *             @OA\Property(
    *                 property="image",
    *                 type="string"
    *             ),
    *             @OA\Property(
    *                 property="stock",
    *                 type="integer"
    *             ),
    *             example=
    *             {
    *                 "shop_id": "4ed6914e-eff9-3b61-b0b0-6498f77a35f0",
    *                 "category_id": "4ed69141-eff9-3b61-b0b0-6498f77a35f0",
    *                 "name": "Chetos",
    *                 "image": "http://marioruizmadrigal.com/blog/wp-content/uploads/2019/08/chetos-flamin-hot.jpg",
    *                 "price": "8",
    *                 "stock": "50",
    *             }
    *           )
    *       )
    *   ),
    *   @OA\Response(
    *       response=200,
    *       description="Update product"
    *   ),
    *   @OA\Response(
    *       response="500",
    *       description="Something when wrong"
    *    )
    * )
    */

    public function update(ProductUpdate $product, $id)
    {
        return $this->productRepository->update($product, $id);
    }

    /**
    * @OA\Delete(
    *     path="/api/manage/products/{id}",
    *     summary="Delete product",
    *     tags={"Products"},
    *     security={{"bearerAuth":{}}},
    *     @OA\Parameter(
    *       name="id",
    *       in="path",
    *       required=true,
    *     ), 
    *     @OA\Response(
    *         response=204,
    *         description="Delete product"
    *     ),
    *     @OA\Response(
    *         response="500",
    *         description="Something when wrong"
    *     )
    * )
    */

    public function destroy($id)
    {
        return $this->productRepository->destroy($id);
    }
}
