<?php

namespace App\Observers\Product;

use App\Models\Product;
use Illuminate\Support\Str;

class ProductObserver
{
    public function creating(Product $product): void
    {
        // Generate slug saat pembuatan produk
        if (empty($product->slug)) {
            $product->slug = strtolower(Str::slug($product->name . '-' . time()));
        } else {
            $product->slug = strtolower(Str::slug($product->slug . '-' . time()));
        }
    }

    public function created(Product $product): void
    {
        //
    }

    public function updating(Product $product): void
    {
        // Update slug jika name berubah (kecuali jika slug diubah manual)
        if ($product->isDirty('name') && !$product->isDirty('slug')) {
            $product->slug = strtolower(Str::slug($product->name . '-' . time()));
        }

        // Jika slug diubah manual
        if ($product->isDirty('slug')) {
            $product->slug = strtolower(Str::slug($product->slug . '-' . time()));
        }
    }

    public function updated(Product $product): void
    {
        //
    }

    public function deleted(Product $product): void
    {
        //
    }

    public function restored(Product $product): void
    {
        //
    }

    public function forceDeleted(Product $product): void
    {
        //
    }
}