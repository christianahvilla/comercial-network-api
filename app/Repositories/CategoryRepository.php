<?php

namespace App\Repositories;

use App\Http\Requests\Category\CategoryStore;
use App\Http\Requests\Category\CategoryUpdate;
use App\Models\Category;
use App\Interfaces\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function all()
    {
        return Category::all();
    }

    public function find($id)
    {
        return Category::findOrFail($id);
    }

    public function store(CategoryStore $category)
    {
        Category::create($category->all());
        return 201;
    }

    public function put(CategoryUpdate $category, $id)
    {
        $oldCategory = Category::findOrFail($id);
        $oldCategory->update($category->all());
        return $oldCategory;
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return 204;
    }
}