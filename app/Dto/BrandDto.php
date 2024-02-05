<?php

namespace App\Dto;

use Spatie\LaravelData\Data;

class BrandDto extends Data
{
    function __construct(
        public readonly string $id,
        public readonly string $name
    ) {
    }
}
