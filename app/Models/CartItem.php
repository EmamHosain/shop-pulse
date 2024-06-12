<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;
    // Define the table associated with the model
    protected $table = 'cart_items';

    // Specify the primary key field (optional, Laravel uses `id` by default)
    protected $primaryKey = 'id';

    // Define which attributes can be mass assigned
    protected $fillable = [
        'product_id'
    ];

    // Add any necessary casts or date properties
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Define the relationship to the Product model
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
