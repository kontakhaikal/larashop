<?php

namespace App\Services;

use App\Dto\AddCategoryRequest;
use App\Models\Category;
use Illuminate\Support\Collection;

class CategoryServiceImpl implements CategoryService
{
    function getCategories(): Collection
    {
        return Category::all();
    }

    function addCategory(AddCategoryRequest $request): string
    {
        $category = Category::create($request->all());
        $category->save();
        return $category->id;
    }
}
