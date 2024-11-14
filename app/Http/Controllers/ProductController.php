<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductSingleResource;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // Ambil query pencarian dari request
        $search = $request->query('search');

        // Query produk dengan pencarian (jika ada)
        $products = Product::when($search, function ($query) use ($search) {
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
        })->paginate();

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
        Gate::authorize('create', Product::class);

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
            'data'    => new ProductSingleResource($product),
        ]);
    }

    public function show(Product $product)
    {
        return new ProductSingleResource($product);
    }

    public function update(ProductRequest $request, Product $product)
    {
        Gate::authorize('update', $product);

        $product->update($request->validated());

        if ($request->wantsJson()) {
            return response()->json([
                'message' => 'data was updated',
                'data'    => new ProductSingleResource($product),
            ]);
        }

        return to_route('products.index')->with('success', 'Data was updated');
    }

    public function destroy(Product $product, Request $request)
    {
        Gate::authorize('delete', $product);

        $product->delete();

        if ($request->wantsJson()) {
            return response()->json([
                'message' => 'Product deleted successfully',
            ]);
        }

        return to_route('products.index')->with('success', 'Product deleted successfully');
    }
}