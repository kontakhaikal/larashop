<?php

namespace App\Dto;

use Spatie\LaravelData\Attributes\Validation\BooleanType;
use Spatie\LaravelData\Attributes\Validation\StringType;
use Spatie\LaravelData\Data;

class LoginUserRequest extends Data
{
    public function __construct(
        #[StringType()]
        public readonly string $username,
        #[StringType()]
        public readonly string $password,
        #[BooleanType()]
        public readonly bool $remember
    ) {
    }
}
