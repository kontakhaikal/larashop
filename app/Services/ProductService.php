<?php

namespace App\Services;

use App\Dto\AddProductRequest;
use App\Dto\ProductDetailDto;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\DataCollection;

interface ProductService
{
    function addProduct(AddProductRequest $request): string;
    /**
     * @return DataCollection<ProductDto>
     */
    function getProducts(): DataCollection;

    function getProductDetail(string $id): ProductDetailDto;
}
