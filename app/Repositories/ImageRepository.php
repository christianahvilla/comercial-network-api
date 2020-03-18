<?php

namespace App\Repositories;

use App\Http\Requests\Image\ImageStore;
use App\Http\Requests\Image\ImageUpdate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades;
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

    public function store(Request $request)
    {
        //return Image::create($image->all());
        if($request->hasFile('image')) {

            //get filename with extension
            $filenamewithextension = $request->file('image')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('image')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;

            //Upload File to s3
            Facades\Storage::disk('s3')->put($filenametostore, fopen($request->file('image'), 'r+'), 'public');

            return Facades\Storage::disk('s3')->url($filenametostore);
        }
    }

    public function update(Request $request, $id)
    {
        $oldImage = Image::findOrFail($id);
        $oldImage->update($request->all());
        return $oldImage;
    }

    public function destroy($url)
    {
        Facades\Storage::disk('s3')->delete($url);
        return 204;
    }
}