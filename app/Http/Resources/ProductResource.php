<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'           => $this->id,
            'name'         => $this->name,
            'slug'         => $this->slug,
            'price'        => number_format($this->price, thousands_separator: '.'),
            'actual_price' => $this->price,
            'stock'        => $this->stock,
            'category'     => $this->category,
        ];
    }
}