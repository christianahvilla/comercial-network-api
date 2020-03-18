<?php

namespace App\Interfaces;

use Illuminate\Http\Request;
use App\Http\Requests\Image\ImageStore;
use App\Http\Requests\Image\ImageUpdate;

interface ImageRepositoryInterface
{

    public function index($id);

    public function store(Request $shop);
    
    public function show($id);

    public function update(Request $request, $oldUrl);

    public function destroy($url);

}