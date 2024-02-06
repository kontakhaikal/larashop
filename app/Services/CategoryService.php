<?php

namespace App\Services;

use App\Dto\AddCategoryRequest;
use App\Dto\UpdateCategoryRequest;
use Illuminate\Support\Collection;

interface CategoryService
{
    function getCategories(): Collection;
    function addCategory(AddCategoryRequest $request): string;
    function updateCategory(string $id, UpdateCategoryRequest $request): string;
    function deleteCategory(string $id);
}
