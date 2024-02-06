<?php

namespace App\Services;

use App\Dto\AddBrandRequest;
use App\Dto\UpdateBrandRequest;
use App\Exceptions\BrandNotFoundException;
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

    function updateBrand(string $id, UpdateBrandRequest $request): string
    {
        $brand = Brand::find($id);

        if ($brand == null) {
            throw new BrandNotFoundException();
        }

        $brand->name = $request->name;

        $brand->save();

        return $brand->id;
    }

    function deleteBrand(string $id)
    {
        $brand = Brand::find($id);

        if ($brand == null) {
            throw new BrandNotFoundException();
        }

        $brand->delete();
    }
}
