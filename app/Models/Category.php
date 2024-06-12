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
        'cat_logo'
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

    // Example of an accessor (optional, if you need it)
    public function getLogoUrlAttribute()
    {
        // Assuming `cat_logo` stores a file path, and you want to create a URL
        return url('storage/' . $this->cat_logo);
    }

    // Example of a mutator (optional, if you need it)
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = \Str::slug($value);
    }
}
