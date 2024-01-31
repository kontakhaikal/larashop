<?php

namespace App\Services;

use App\Dto\AddBrandRequest;
use App\Models\Brand;
use Illuminate\Support\Collection;

interface BrandService
{
    function addBrand(AddBrandRequest $request): string;
    function getBrands(): Collection;
}
