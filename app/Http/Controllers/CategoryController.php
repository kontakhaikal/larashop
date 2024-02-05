<?php

namespace App\Http\Controllers;

use App\Dto\AddCategoryRequest;
use App\Services\CategoryService;

class CategoryController extends Controller
{
    function __construct(private readonly CategoryService $categoryService)
    {
    }

    function addCategory(AddCategoryRequest $input)
    {
        return $this->categoryService->addCategory($input);
    }

    function getCategories()
    {
        return $this->categoryService->getCategories();
    }
}
