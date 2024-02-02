<?php

namespace App\Services;

use App\Dto\AddProductRequest;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\DataCollection;

interface ProductService
{
    function addProduct(AddProductRequest $request): string;
    /**
     * @return DataCollection<ProductDto>
     */
    function getProducts(): DataCollection;
}
