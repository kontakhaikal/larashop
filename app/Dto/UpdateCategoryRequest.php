<?php

namespace App\Dto;

use Spatie\LaravelData\Data;

class UpdateCategoryRequest extends Data
{
    function __construct(public readonly string $name)
    {
    }
}
