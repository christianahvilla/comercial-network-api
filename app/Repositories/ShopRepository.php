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
        return Shop::orderBy('name')->get();
    }

    public function show($id)
    {
        return Shop::findOrFail($id);
    }

    public function store(ShopStore $shop)
    {
        return Shop::create($shop->all());
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
        return $shop->update($shop->all());
    }

    public function destroy($id)
    {
        $shop = Shop::findOrFail($id);
        $shop->delete();
        return $shop;
    }
}