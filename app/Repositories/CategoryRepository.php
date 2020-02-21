<?php

namespace App\Repositories;

use App\Http\Requests\Category\CategoryStore;
use App\Http\Requests\Category\CategoryUpdate;
use App\Models\Category;
use App\Interfaces\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function index()
    {
        return Category::orderBy('category')->get();
    }

    public function show($id)
    {
        return Category::findOrFail($id);
    }

    public function store(CategoryStore $category)
    {
        return Category::create($category->all());
    }

    public function update(CategoryUpdate $category, $id)
    {
        $oldCategory = Category::findOrFail($id);
        $oldCategory->update($category->all());
        return $oldCategory;
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return $category;
    }
}