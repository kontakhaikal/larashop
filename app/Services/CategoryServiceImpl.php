<?php

namespace App\Services;

use App\Dto\AddCategoryRequest;
use App\Dto\UpdateCategoryRequest;
use App\Exceptions\CategoryNotFoundException;
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

    function updateCategory(string $id, UpdateCategoryRequest $request): string
    {
        $category = Category::find($id);

        if ($category == null) {
            throw new CategoryNotFoundException();
        }

        $category->name = $request->name;
        $category->save();

        return $category->id;
    }

    function deleteCategory(string $id)
    {
        $category = Category::find($id);

        if ($category == null) {
            throw new CategoryNotFoundException();
        }

        $category->delete();
    }
}
