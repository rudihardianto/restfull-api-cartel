<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductSingleResource;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::paginate();

        if ($request->wantsJson()) {
            return response()->json([
                'data' => ProductResource::collection($products),
            ]);
        }

        return view('products.index', [
            'products' => ProductResource::collection($products),
        ]);
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

    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->validated());

        if ($request->wantsJson()) {
            return response()->json([
                'message' => 'data was updated',
                'product' => new ProductSingleResource($product),
            ]);
        }

        return to_route('products.index')->with('success', 'Data was updated');
    }

    public function destroy(Product $product, Request $request)
    {
        $product->delete();

        if ($request->wantsJson()) {
            return response()->json([
                'message' => 'Product deleted successfully',
            ]);
        }

        return to_route('products.index')->with('success', 'Product deleted successfully');
    }
}