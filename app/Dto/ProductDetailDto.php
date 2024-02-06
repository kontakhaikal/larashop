<?php

namespace App\Dto;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class ProductDetailDto extends Data
{
    function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly string $description,
        public readonly string $image,
        public readonly int $price,
        public readonly int $stock,
        public readonly BrandDto $brand,
        #[DataCollectionOf(CategoryDto::class)]
        public readonly DataCollection $categories,
    ) {
    }
}
