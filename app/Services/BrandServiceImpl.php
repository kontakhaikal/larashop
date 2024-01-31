<?php

namespace App\Services;

use App\Dto\AddBrandRequest;
use App\Models\Brand;
use Illuminate\Support\Collection;

class BrandServiceImpl implements BrandService
{
    function addBrand(AddBrandRequest $request): string
    {
        $brand = Brand::create($request->all());
        $brand->save();
        return $brand->id;
    }

    function getBrands(): Collection
    {
        return Brand::all();
    }
}
