<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $name = fake()->sentence(5),
            'slug' => str()->slug($name),
        ];
    }
}