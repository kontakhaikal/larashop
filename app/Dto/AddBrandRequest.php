<?php

namespace App\Dto;

use Spatie\LaravelData\Attributes\Validation\Between;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Data;

class AddBrandRequest extends Data
{
    public function __construct(
        #[Between(1, 50)]
        public readonly string $name
    ) {
    }
}
