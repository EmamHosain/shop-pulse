<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    // Define the table associated with the model
    protected $table = 'brands';

    // Specify the primary key field (optional, Laravel uses `id` by default)
    protected $primaryKey = 'id';

    // Define which attributes can be mass assigned
    protected $fillable = [
        'brand_name',
        'brand_logo',
        'slug',
        'brand_slider',
        'is_banner',
        'published',
    ];

    // Add any necessary casts or date properties
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // If you have any relationships, define them here
    // Example of a relationship method (adjust based on actual application needs)
    public function products()
    {
        return $this->hasMany(Product::class); // Assuming a Brand can have many Products
    }

    
}
