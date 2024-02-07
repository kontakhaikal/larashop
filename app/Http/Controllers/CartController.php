<?php

namespace App\Http\Controllers;

use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller

{
    function __construct(private readonly CartService $cartService)
    {
    }
    function show(Request $request)
    {
    }
}
