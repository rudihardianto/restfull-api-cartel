<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductSingleResource;

class ProductController extends Controller
{
    public function index()
    {
        return ProductResource::collection(Product::paginate(16));
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Product $product)
    {
        return new ProductSingleResource($product);
    }

    public function update(Request $request, Product $product)
    {
        //
    }

    public function destroy(Product $product)
    {
        //
    }
}