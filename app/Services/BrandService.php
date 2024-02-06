<?php

namespace App\Services;

use App\Dto\AddBrandRequest;
use App\Dto\UpdateBrandRequest;
use App\Models\Brand;
use Illuminate\Support\Collection;

interface BrandService
{
    function addBrand(AddBrandRequest $request): string;
    function updateBrand(string $id, UpdateBrandRequest $request): string;
    function getBrands(): Collection;
    function deleteBrand(string $id);
}
