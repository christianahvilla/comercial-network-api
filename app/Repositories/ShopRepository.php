<?php

namespace App\Repositories;

use App\Http\Requests\Shop\ShopStore;
use App\Http\Requests\Shop\ShopUpdate;
use App\Interfaces\ShopRepositoryInterface;
use App\Models\Shop;

class ShopRepository implements ShopRepositoryInterface
{
    public function index()
    {
        return Shop::all();
    }

    public function show($id)
    {
        return Shop::findOrFail($id);
    }

    public function store(ShopStore $shop)
    {
        Shop::create($shop->all());
        return 201;
    }

    public function update(ShopUpdate $shop, $id)
    {
        $oldShop = Shop::findOrFail($id);
        $oldShop->update($shop->all());
        return $oldShop;
    }

    public function disable($id)
    {
        $shop = Shop::findOrFail($id);
        $shop->enabled = 0;
        $shop->update($shop->all());
        return 201;
    }

    public function destroy($id)
    {
        $image = Shop::findOrFail($id);
        $image->delete();
        return 204;
    }
}