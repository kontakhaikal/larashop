<?php

namespace App\Services;

use App\Dto\AddProductRequest;
use App\Dto\ProductDto;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Validation\ValidationException;
use Spatie\LaravelData\DataCollection;

class ProductServiceImpl implements ProductService
{
    public function addProduct(AddProductRequest $request): string
    {
        $categories = Category::whereIn('id', $request->category_ids)->get();

        if ($categories->count() != count($request->category_ids)) {
            throw new ValidationException(['category_ids' => 'One or more categories not found']);
        }

        $brand = Brand::where('id', $request->brand_id)->first();

        if ($brand == null) {
            throw new ValidationException(['brand_id' => 'Brand not found']);
        }

        $imageUrl = Cloudinary::upload($request->image->getRealPath())->getSecurePath();

        $product = new Product([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' =>  $imageUrl,
            'description' => $request->description
        ]);

        $product->brand_id = $brand->id;

        $product->save();

        $product->categories()->attach($categories);

        return $product->id;
    }

    public function getProducts(): DataCollection
    {
        return ProductDto::collection(Product::all());
    }
}