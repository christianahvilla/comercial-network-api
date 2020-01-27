<?php

namespace App\Http\Controllers;

use App\Http\Requests\Image\ImageStore;
use App\Http\Requests\Image\ImageUpdate;
use App\Interfaces\ImageRepositoryInterface;

class ImageController extends Controller
{

    private $imageRepository;

    public function __construct(ImageRepositoryInterface $imageRepository)
    {
        $this->imageRepository = $imageRepository;
    }

    /**
    * @OA\Get(
    *     path="/api/manage/images/{id}",
    *     summary="Display images",
    *     tags={"Manage"},
    *     security={{"bearerAuth":{}}}, 
    *     @OA\Parameter(
    *       name="id",
    *       in="path",
    *       required=true,
    *     ),
    *     @OA\Response(
    *         response=200,
    *         description="Display all images"
    *     ),
    *     @OA\Response(
    *         response="500",
    *         description="Something when wrong"
    *     )
    * )
    */
    
    public function index($id)
    {
        return $this->imageRepository->index($id);
    }

    /**
    * @OA\Post(
    *     path="/api/manage/images",
    *     summary="Create image",
    *     tags={"Manage"},
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
    *                   property="shop_id",
    *                   type="string"
    *               ),
    *               @OA\Property(
    *                   property="url",
    *                   type="string"
    *               ),
    *               example=
    *               {
    *                   "id": "4ed6914e-eff9-3b61-b0b0-6498f77a35f1",
    *                   "shop_id": "4ed6914e-eff9-3b61-b0b0-6498f77a35f1",
    *                   "url": "https://tecnologia-informatica.com/wp-content/uploads/2018/01/que-es-meme-como-hacer-memes-7.jpg"
    *               }
    *             )
    *         )
    *     ),
    *     @OA\Response(
    *         response=201,
    *         description="Create image"
    *     ),
    *     @OA\Response(
    *         response="500",
    *         description="Something when wrong"
    *     )
    * )
    */ 
    
    public function store(ImageStore $image)
    {
        return $this->imageRepository->index($image);
    }

    /**
    * @OA\Get(
    *     path="/api/manage/images/specific/{id}",
    *     summary="Display image",
    *     tags={"Manage"},
    *     security={{"bearerAuth":{}}},
    *     @OA\Parameter(
    *       name="id",
    *       in="path",
    *       required=true,
    *     ),
    *     @OA\Response(
    *         response=200,
    *         description="Display an specific image"
    *     ),
    *     @OA\Response(
    *         response="500",
    *         description="Something when wrong"
    *     )
    * )
    */

    public function show($id)
    {
        return $this->imageRepository->show($id);
    }

    /**
    * @OA\Put(
    *     path="/api/manage/images/{id}",
    *     summary="Update image",
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
    *                   property="shop_id",
    *                   type="string"
    *               ),
    *               @OA\Property(
    *                   property="url",
    *                   type="string"
    *               ),
    *               example=
    *               {
    *                   "id": "4ed6914e-eff9-3b61-b0b0-6498f77a35f1",
    *                   "shop_id": "4ed6914e-eff9-3b61-b0b0-6498f77a35f1",
    *                   "url": "https://tecnologia-informatica.com/wp-content/uploads/2018/01/que-es-meme-como-hacer-memes-7.jpg"
    *               }
    *             )
    *         )
    *     ),
    *     @OA\Response(
    *         response=201,
    *         description="Update image"
    *     ),
    *     @OA\Response(
    *         response="500",
    *         description="Something when wrong"
    *     )
    * )
    */ 

    public function update(ImageUpdate $image, $id)
    {
        return $this->imageRepository->update($image, $id);
    }

    /**
    * @OA\Delete(
    *     path="/api/manage/images/{id}",
    *     summary="Delete image",
    *     tags={"Manage"},
    *     security={{"bearerAuth":{}}},
    *     @OA\Parameter(
    *       name="id",
    *       in="path",
    *       required=true,
    *     ), 
    *     @OA\Response(
    *         response=204,
    *         description="Delete image"
    *     ),
    *     @OA\Response(
    *         response="500",
    *         description="Something when wrong"
    *     )
    * )
    */
    
    public function destroy($id)
    {
        return $this->imageRepository->destroy($id);
    }
}
