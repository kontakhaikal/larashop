<?php

namespace App\Dto;

use Spatie\LaravelData\Data;

class ProductDto extends Data
{
    public function __construct(
        public string $id,
        public string $name,
        public int $price,
        public readonly string $image
    ) {
    }
}
