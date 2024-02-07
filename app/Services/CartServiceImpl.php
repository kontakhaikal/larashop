<?php

namespace App\Services;

use App\Models\Cart;

class CartServiceImpl implements CartService
{
    function createCart(string $customerId): string
    {
        $cart = new Cart();
        $cart->customer_id = $customerId;
        $cart->save();
        return $cart->id;
    }
}
