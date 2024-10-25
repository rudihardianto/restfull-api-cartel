<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Electronics',
                'slug' => 'electronics',
            ],
            [
                'name' => 'Fashion',
                'slug' => 'fashion',
            ],
            [
                'name' => 'Home & Living',
                'slug' => 'home-living',
            ],
            [
                'name' => 'Sports',
                'slug' => 'sports',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}