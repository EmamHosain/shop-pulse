<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandSlider extends Model
{
    use HasFactory;
    // Define the table associated with the model
    protected $table = 'brand_sliders';

    // Specify the primary key field (optional, Laravel uses `id` by default)
    protected $primaryKey = 'id';

    // Define which attributes can be mass assigned
    protected $fillable = [
        'brand_id',
        'brand_slider_name',
        'brand_slider',
        'slug'
    ];

    // Add any necessary casts or date properties
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Define the relationship to the Brand model
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    // Example of an accessor (optional, if you need it)
    public function getSliderUrlAttribute()
    {
        // Assuming `brand_slider` stores a file path, and you want to create a URL
        return url('storage/' . $this->brand_slider);
    }

    // Example of a mutator (optional, if you need it)
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = \Str::slug($value);
    }
}
