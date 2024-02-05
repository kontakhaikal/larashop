<?php

namespace App\Http\Controllers;

use App\Dto\AddBrandRequest;
use App\Services\BrandService;

class BrandController extends Controller
{
    function __construct(private readonly BrandService $brandService)
    {
    }

    function addBrand(AddBrandRequest $input)
    {
        return $this->brandService->addBrand($input);
    }


    function getBrands()
    {
        return $this->brandService->getBrands();
    }
}
