<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'category_id' => ['required'],
            'name'        => ['required'],
            'description' => ['required'],
            'stock'       => ['required', 'numeric'],
            'price'       => ['required', 'numeric', 'min:1000'],
        ];
    }

    public function messages(): array
    {
        return [
            'price' => 'Ups! Harga mulai dari Rp 1.000 ke atas. Mohon disesuaikan.',
        ];
    }
}
