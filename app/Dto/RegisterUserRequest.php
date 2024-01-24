<?php

namespace App\Dto;

use App\Validation\UniqueUsername;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\AlphaNumeric;
use Spatie\LaravelData\Attributes\Validation\Password;

class RegisterUserRequest extends Data
{
    function __construct(
        #[
            Min(5),
            Max(12),
            AlphaNumeric(),
            UniqueUsername()
        ]
        public readonly string $username,

        #[
            Min(8),
            Max(64),
            Password(8, true, true, true, true)
        ]
        public readonly string $password
    ) {
    }
}
