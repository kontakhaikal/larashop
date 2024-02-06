<?php

namespace App\Dto;

use Spatie\LaravelData\Data;

class UpdateBrandRequest extends Data
{
    function __construct(public readonly string $name)
    {
    }
}
