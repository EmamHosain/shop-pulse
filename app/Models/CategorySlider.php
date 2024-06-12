<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorySlider extends Model
{
    use HasFactory;
    // Define the table associated with the model
    protected $table = 'category_sliders';
    // Specify the primary key field
    protected $primaryKey = 'id';
    // Define which attributes can be mass assigned
    protected $fillable = [
        'category_id',
        'cat_slider_name',
        'cat_slider',
        'slug'
    ];

    // Add any necessary casts or date properties
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Define the relationship to the Category model
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    // Example of an accessor (optional, if you need it)
    public function getSliderUrlAttribute()
    {
        // Assuming `cat_slider` stores a file path, and you want to create a URL
        return url('storage/' . $this->cat_slider);
    }

    // Example of a mutator (optional, if you need it)
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = \Str::slug($value);
    }
}
