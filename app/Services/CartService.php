<?php

namespace App\Services;

interface CartService
{
    function createCart(string $customerId): string;
}
