<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    // Define the table associated with the model
    protected $table = 'products';

    // Specify the primary key field (optional, Laravel uses `id` by default)
    protected $primaryKey = 'id';

    // Define which attributes can be mass assigned
    protected $fillable = [
        'brand_id',
        'title',
        'slug',
        'quantity',
        'short_description',
        'long_description',
        'published',
        'inStock',
        'stock_count',
        'price',
        'discount_percentage',
        'discount_price'
    ];

    // Add any necessary casts or date properties
    protected $casts = [
        'published' => 'boolean',
        'inStock' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Define the relationship to the Brand model
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
    public function productUnits()
    {
        return $this->belongsToMany(ProductUnit::class, 'product_product_unit');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_product');
    }





    // Example of an accessor (optional, if you need it)
    public function getDiscountedPriceAttribute()
    {
        // Calculate the discounted price
        return $this->price - ($this->price * ($this->discount_percentage / 100));
    }

}
