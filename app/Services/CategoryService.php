<?php

namespace App\Services;

use App\Dto\AddCategoryRequest;
use Illuminate\Support\Collection;

interface CategoryService
{
    public function getCategories(): Collection;
    public function addCategory(AddCategoryRequest $request): string;
}
