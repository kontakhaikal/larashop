<?php

namespace App\Http\Controllers;

use App\Dto\AddBrandRequest;
use App\Dto\UpdateBrandRequest;
use App\Services\BrandService;

class BrandController extends Controller
{
    function __construct(private readonly BrandService $brandService)
    {
    }

    function addBrand(AddBrandRequest $input)
    {
        $this->brandService->addBrand($input);
        return back();
    }


    function getBrands()
    {
        return $this->brandService->getBrands();
    }

    function updateBrand(string $id, UpdateBrandRequest $data)
    {
        $this->brandService->updateBrand($id, $data);
        return back();
    }

    function deleteBrand(string $id)
    {
        $this->brandService->deleteBrand($id);
        return back();
    }
}
