<?php

namespace App\Interfaces;

use App\Http\Requests\Product\ProductStore;
use App\Http\Requests\Product\ProductUpdate;


interface ProductRepositoryInterface
{

    public function all();

    public function find($id);

    public function store(ProductStore $product);

    public function put(ProductUpdate $product, $id);

    public function delete($id);

}