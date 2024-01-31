<?php

namespace App\Dto;

use Spatie\LaravelData\Data;

class AddBrandRequest extends Data
{
    public function __construct(
        public readonly string $name
    ) {
    }
}
