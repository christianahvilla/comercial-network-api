<?php

namespace App\Interfaces;

use App\Http\Requests\Image\ImageStore;
use App\Http\Requests\Image\ImageUpdate;

interface ImageRepositoryInterface
{

    public function index($id);

    public function store(ImageStore $shop);
    
    public function show($id);

    public function update(ImageUpdate $shop, $id);

    public function destroy($id);

}