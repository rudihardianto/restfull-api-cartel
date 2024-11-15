<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Observers\Product\ProductObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'name', 'description', 'slug', 'price', 'stock'];
    protected $with     = ['category'];

    protected static function booted()
    {
        Product::observe(ProductObserver::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
