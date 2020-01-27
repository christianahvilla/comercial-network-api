<?php

namespace App\Interfaces;

use App\Http\Requests\Shop\ShopStore;
use App\Http\Requests\Shop\ShopUpdate;

interface ShopRepositoryInterface
{

    public function index();

    public function store(ShopStore $shop);

    public function show($id);

    public function update(ShopUpdate $shop, $id);

    public function disable($id);

    public function destroy($id);

}