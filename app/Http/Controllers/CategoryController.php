<?php

namespace App\Http\Controllers;

use App\Dto\AddCategoryRequest;
use App\Dto\UpdateCategoryRequest;
use App\Services\CategoryService;
use Cloudinary\Api\HttpStatusCode;

class CategoryController extends Controller
{
    function __construct(private readonly CategoryService $categoryService)
    {
    }

    function addCategory(AddCategoryRequest $input)
    {
        $this->categoryService->addCategory($input);
        return back();
    }

    function getCategories()
    {
        return $this->categoryService->getCategories();
    }

    function updateCategory(string $id, UpdateCategoryRequest $data)
    {
        $this->categoryService->updateCategory($id, $data);
        return back();
    }

    function deleteCategory(string $id)
    {
        $this->categoryService->deleteCategory($id);
        return back();
    }
}
