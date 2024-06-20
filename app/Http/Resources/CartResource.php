<?php

namespace App\Http\Resources;

use App\Models\Product;
use App\Helper\CartHelper;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        [$products, $cartItems] = $this->resource;

        // Create a lookup for cart items based on product_id for faster access
        $cartItemQuantities = [];
        foreach ($cartItems as $item) {
            $cartItemQuantities[$item['product_id']] = $item['quantity'];
        }

        $total_price = 0;
        foreach ($products as $product) {
            $price = $product->discount_price ?? $product->price; 
            $quantity = $cartItemQuantities[$product->id] ?? 0;
            $total_price += $price * $quantity;
        }

        return [
            'count' => CartHelper::getCount(),
            'total' => $total_price,
            'items' => $cartItems,
            'products' => ProductResource::collection($products),
        ];

    }
}
