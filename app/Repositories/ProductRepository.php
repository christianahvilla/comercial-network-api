<?php

namespace App\Repositories;

use App\Http\Requests\Product\ProductStore;
use App\Http\Requests\Product\ProductUpdate;
use App\Models\Product;
use App\Interfaces\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    public function index()
    {
        return Product::all();
    }

    public function show($id)
    {
        return Product::findOrFail($id);
    }

    public function store(ProductStore $product)
    {
        Product::create($product->all());
        return 201;
    }

    public function update(ProductUpdate $product, $id)
    {
        $oldProduct = Product::findOrFail($id);
        $oldProduct->update($product->all());
        return $oldProduct;
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return 204;
    }
}