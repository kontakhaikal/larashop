<?php

namespace App\Http\Controllers;

use App\Dto\AddProductRequest;
use App\Services\ProductService;
use Inertia\Inertia;

class ProductController extends Controller
{
    function __construct(private readonly ProductService $productService)
    {
    }


    function addProduct(AddProductRequest $input)
    {
        return $this->productService->addProduct($input);
    }

    function getProducts()
    {
        return $this->productService->getProducts();
    }

    function showProductDetail(string $id)
    {
        $product = $this->productService->getProductDetail($id);

        return Inertia::render('ProductDetail', [
            'product' => $product
        ]);
    }
}
