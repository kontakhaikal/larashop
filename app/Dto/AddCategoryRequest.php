<?php

namespace App\Dto;

use Spatie\LaravelData\Attributes\Validation\Between;
use Spatie\LaravelData\Data;

class AddCategoryRequest extends Data
{
    function __construct(
        #[Between(1, 50)]
        public readonly string $name
    ) {
    }
}
