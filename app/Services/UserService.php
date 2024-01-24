<?php

namespace App\Services;

use App\Dto\RegisterUserRequest;

interface UserService
{

    function registerAdmin(RegisterUserRequest $request): string;
    function registerCustomer(RegisterUserRequest $request): string;
}
