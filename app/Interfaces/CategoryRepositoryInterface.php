<?php

namespace App\Interfaces;

use App\Http\Requests\Category\CategoryStore;
use App\Http\Requests\Category\CategoryUpdate;


interface CategoryRepositoryInterface
{

    public function all();

    public function find($id);

    public function store(CategoryStore $category);

    public function put(CategoryUpdate $category, $id);

    public function delete($id);

}