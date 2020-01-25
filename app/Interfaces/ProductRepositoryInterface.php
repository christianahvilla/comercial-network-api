<?php

namespace App\Interfaces;

use App\Http\Requests\Product\ProductStore;
use App\Http\Requests\Product\ProductUpdate;


interface ProductRepositoryInterface
{

    public function index();

    public function show($id);

    public function store(ProductStore $product);

    public function update(ProductUpdate $product, $id);

    public function destroy($id);

}