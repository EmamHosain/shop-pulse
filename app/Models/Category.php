<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    // Define the table associated with the model
    protected $table = 'categories';

    // Specify the primary key field (optional, Laravel uses `id` by default)
    protected $primaryKey = 'id';

    // Define which attributes can be mass assigned
    protected $fillable = [
        'cat_name',
        'slug',
        'cat_logo',
        'published',
        'cat_slider',
        'isSliderForCarousel'
    ];

    // Add any necessary casts or date properties
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // If you have any relationships or additional methods, define them here

    // Example of a relationship method
    public function products()
    {
        return $this->belongsToMany(Product::class, 'category_product'); // Assuming a many-to-many relationship
    }

   



}
