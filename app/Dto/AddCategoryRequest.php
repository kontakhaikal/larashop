<?php

namespace App\Dto;

use Spatie\LaravelData\Data;

class AddCategoryRequest extends Data
{
    function __construct(
        public readonly string $name
    ) {
    }
}
