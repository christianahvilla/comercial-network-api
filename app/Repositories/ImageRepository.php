<?php

namespace App\Repositories;

use App\Http\Requests\Image\ImageStore;
use App\Http\Requests\Image\ImageUpdate;
use App\Interfaces\ImageRepositoryInterface;
use App\Models\Image;

class ImageRepository implements ImageRepositoryInterface
{
    public function index($id)
    {
        return Image::where('shop_id',$id)->get();
    }

    public function show($id)
    {
        return Image::findOrFail($id);
    }

    public function store(ImageStore $image)
    {
        Image::create($image->all());
        return 201;
    }

    public function update(ImageUpdate $image, $id)
    {
        $oldImage = Image::findOrFail($id);
        $oldImage->update($image->all());
        return $oldImage;
    }

    public function destroy($id)
    {
        $image = Image::findOrFail($id);
        $image->delete();
        return 204;
    }
}