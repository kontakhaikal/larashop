<?php

namespace App\Dto;

use Illuminate\Http\UploadedFile;
use Spatie\LaravelData\Attributes\Validation\ArrayType;
use Spatie\LaravelData\Attributes\Validation\Between;
use Spatie\LaravelData\Attributes\Validation\Image;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\MinDigits;
use Spatie\LaravelData\Attributes\Validation\Uuid;
use Spatie\LaravelData\Data;

class AddProductRequest extends Data
{
    /**
     * @param string[] $category_ids
     */
    function __construct(
        #[Max(225), Min(1)]
        public readonly string $name,
        #[Max(1_000), Min(1)]
        public readonly string $description,
        #[MinDigits(0)]
        public readonly int $stock,
        #[MinDigits(0)]
        public readonly int $price,
        #[Image()]
        public readonly UploadedFile $image,
        #[Uuid()]
        public readonly string $brand_id,
        #[ArrayType(), Between(1, 3)]
        public readonly array $category_ids
    ) {
    }
}
