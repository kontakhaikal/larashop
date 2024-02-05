<?php

namespace App\Dto;

use Spatie\LaravelData\Data;

class CategoryDto extends Data
{
    function __construct(
        public readonly string $id,
        public readonly string $name
    ) {
    }
}
