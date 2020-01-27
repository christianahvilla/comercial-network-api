<?php

namespace App\Http\Controllers;

use App\Http\Requests\Shop\ShopStore;
use App\Http\Requests\Shop\ShopUpdate;
use App\Interfaces\ShopRepositoryInterface;

class ShopController extends Controller
{

    private $shopRepository;

    public function __construct(ShopRepositoryInterface $shopRepository)
    {
        $this->shopRepository = $shopRepository;
    }

    /**
    * @OA\Get(
    *     path="/api/manage/shops",
    *     summary="Display shops",
    *     tags={"Manage"},
    *     security={{"bearerAuth":{}}}, 
    *     @OA\Response(
    *         response=200,
    *         description="Display all shops"
    *     ),
    *     @OA\Response(
    *         response="500",
    *         description="Something when wrong"
    *     )
    * )
    */

    public function index()
    {
        return $this->shopRepository->index();
    }

    /**
    * @OA\Get(
    *     path="/api/manage/shops/{id}",
    *     summary="Display shop",
    *     tags={"Manage"},
    *     security={{"bearerAuth":{}}},
    *     @OA\Parameter(
    *       name="id",
    *       in="path",
    *       required=true,
    *     ),
    *     @OA\Parameter(
    *       name="id",
    *       in="path",
    *       required=true,
    *     ),
    *     @OA\Response(
    *         response=200,
    *         description="Display an specific shop"
    *     ),
    *     @OA\Response(
    *         response="500",
    *         description="Something when wrong"
    *     )
    * )
    */

    public function show($id)
    {
        return $this->shopRepository->show($id);
    }

    /**
    * @OA\Post(
    *   path="/api/manage/shops",
    *   summary="Sotre shop",
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
    *                 property="user_id",
    *                 type="string"
    *             ),
    *             @OA\Property(
    *                 property="name",
    *                 type="string"
    *             ),
    *             @OA\Property(
    *                 property="image",
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
    *                 property="web_page",
    *                 type="string"
    *             ),
    *             @OA\Property(
    *                 property="kind",
    *                 type="string"
    *             ),
    *             @OA\Property(
    *                 property="enabled",
    *                 type="integer"
    *             ),
    *             @OA\Property(
    *                 property="street",
    *                 type="string"
    *             ),
    *             @OA\Property(
    *                 property="neighborhodd",
    *                 type="string"
    *             ),
    *             @OA\Property(
    *                 property="city",
    *                 type="string"
    *             ),
    *             @OA\Property(
    *                 property="long",
    *                 type="float"
    *             ),
    *             @OA\Property(
    *                 property="lat",
    *                 type="float"
    *             ),
    *             @OA\Property(
    *                 property="products_limit",
    *                 type="integer"
    *             ),
    *             @OA\Property(
    *                 property="image_limit",
    *                 type="integer"
    *             ),
    *             example=
    *             {
    *                 "id": "4ed6914e-eff9-3b61-b0b0-6498f77a35f0",
    *                 "user_id": "4ed6914e-eff9-3b61-b0b0-6498f77a35f6",
    *                 "name": "Javier",
    *                 "image": "https://tecnologia-informatica.com/wp-content/uploads/2018/01/que-es-meme-como-hacer-memes-7.jpg",
    *                 "email": "jgutierrez@net.com",
    *                 "phone": "5555555555",
    *                 "web_page": "https://www.intersysconsulting.com/", 
    *                 "kind": "Ferreteria",
    *                 "ebaled": "1",
    *                 "street": "Diego Hernandez Topete",
    *                 "neighborhood": "Primo Tapia",
    *                 "city": "Morelia",
    *                 "long": "-101.186 19", 
    *                 "lat": "19.7006",
    *                 "products_limit": "19",
    *                 "images_limit": "200",
    *             }
    *           )
    *       )
    *   ),
    *   @OA\Response(
    *       response=200,
    *       description="Store shop"
    *   ),
    *   @OA\Response(
    *       response="500",
    *       description="Something when wrong"
    *    )
    * )
    */

    public function store(ShopStore $shop)
    {
        return $this->shopRepository->store($shop);
    }

    /**
    * @OA\Put(
    *   path="/api/manage/shops/{id}",
    *   summary="Update shop",
    *   tags={"Manage"},
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
    *                 property="user_id",
    *                 type="string"
    *             ),
    *             @OA\Property(
    *                 property="name",
    *                 type="string"
    *             ),
    *             @OA\Property(
    *                 property="image",
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
    *                 property="web_page",
    *                 type="string"
    *             ),
    *             @OA\Property(
    *                 property="kind",
    *                 type="string"
    *             ),
    *             @OA\Property(
    *                 property="enabled",
    *                 type="integer"
    *             ),
    *             @OA\Property(
    *                 property="street",
    *                 type="string"
    *             ),
    *             @OA\Property(
    *                 property="neighborhodd",
    *                 type="string"
    *             ),
    *             @OA\Property(
    *                 property="city",
    *                 type="string"
    *             ),
    *             @OA\Property(
    *                 property="long",
    *                 type="float"
    *             ),
    *             @OA\Property(
    *                 property="lat",
    *                 type="float"
    *             ),
    *             @OA\Property(
    *                 property="products_limit",
    *                 type="integer"
    *             ),
    *             @OA\Property(
    *                 property="image_limit",
    *                 type="integer"
    *             ),
    *             example=
    *             {
    *                 "id": "4ed6914e-eff9-3b61-b0b0-6498f77a35f0",
    *                 "user_id": "4ed6914e-eff9-3b61-b0b0-6498f77a35f6",
    *                 "name": "Javier",
    *                 "image": "https://tecnologia-informatica.com/wp-content/uploads/2018/01/que-es-meme-como-hacer-memes-7.jpg",
    *                 "email": "jgutierrez@net.com",
    *                 "phone": "5555555555",
    *                 "web_page": "https://www.intersysconsulting.com/", 
    *                 "kind": "Ferreteria",
    *                 "ebaled": "1",
    *                 "street": "Diego Hernandez Topete",
    *                 "neighborhood": "Primo Tapia",
    *                 "city": "Morelia",
    *                 "long": "-101.186 19", 
    *                 "lat": "19.7006",
    *                 "products_limit": "19",
    *                 "images_limit": "200",
    *             }
    *           )
    *       )
    *   ),
    *   @OA\Response(
    *       response=200,
    *       description="Update shop"
    *   ),
    *   @OA\Response(
    *       response="500",
    *       description="Something when wrong"
    *    )
    * )
    */

    public function update(ShopUpdate $shop, $id)
    {
        return $this->shopRepository->update($shop, $id);
    }

    /**
    * @OA\Put(
    *     path="/api/manage/shops/disable/{id}",
    *     summary="Disable shop",
    *     tags={"Manage"},
    *     security={{"bearerAuth":{}}}, 
    *     @OA\Parameter(
    *       name="id",
    *       in="path",
    *       required=true,
    *     ),
    *     @OA\Response(
    *         response=200,
    *         description="Disable an specific shop"
    *     ),
    *     @OA\Response(
    *         response="500",
    *         description="Something when wrong"
    *     )
    * )
    */

    public function disable($id)
    {
        return $this->shopRepository->disable($id);
    }

    /**
        * @OA\Delete(
        *     path="/api/manage/shops/{id}",
        *     summary="Delete shop",
        *     tags={"Manage"},
        *     security={{"bearerAuth":{}}},
        *     @OA\Parameter(
        *       name="id",
        *       in="path",
        *       required=true,
        *     ), 
        *     @OA\Response(
        *         response=204,
        *         description="Delete shop"
        *     ),
        *     @OA\Response(
        *         response="500",
        *         description="Something when wrong"
        *     )
        * )
    */
    
    public function destroy($id)
    {
        return $this->shopRepository->destroy($id);
    }
}
