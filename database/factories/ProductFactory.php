<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'category_id' => Category::inRandomOrder()->first()->id ?? Category::factory(),
            'name'        => $name = fake()->sentence(),
            'description' => fake()->paragraph(),
            'slug'        => str()->slug($name),
            'price'       => rand(50000, 1500000),
            'stock'       => rand(12, 150),
        ];
    }
}