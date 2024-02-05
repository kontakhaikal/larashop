<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Inertia\Inertia;

class HomeController extends Controller
{

    function __construct(private readonly ProductService $productService)
    {
    }

    function show()
    {
        $products = $this->productService->getProducts();
        return Inertia::render('Home', [
            'products' => $products
        ]);
    }
}
