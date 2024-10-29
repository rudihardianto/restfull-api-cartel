<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductSingleResource;

class ProductController extends Controller
{
    public function index()
    {
        return ProductResource::collection(Product::paginate());
    }

    public function store(ProductRequest $request)
    {
        // $product = Product::create([
        //     'category_id' => $request->category_id,
        //     'name'        => $name = $request->name,
        //     'description' => $request->description,
        //     'price'       => $request->price,
        //     'stock'       => $request->stock,
        // ]);

        $product = Product::create($request->validated());

        return response()->json([
            'message' => 'data was created',
            'product' => new ProductSingleResource($product),
        ]);
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
