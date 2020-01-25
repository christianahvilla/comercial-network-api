<?php

namespace App\Interfaces;

use App\Http\Requests\Category\CategoryStore;
use App\Http\Requests\Category\CategoryUpdate;


interface CategoryRepositoryInterface
{

    public function index();

    public function show($id);

    public function store(CategoryStore $category);

    public function update(CategoryUpdate $category, $id);

    public function destroy($id);

}