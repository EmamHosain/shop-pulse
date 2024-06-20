<?php

namespace App\Http\Resources;


use Illuminate\Http\Request;
use App\Helper\WishListHelper;
use Illuminate\Http\Resources\Json\JsonResource;

class WishListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        [$products, $wishlistItems] = $this->resource;

        // Create a lookup for cart items based on product_id for faster access
        // $cartItemQuantities = [];
        // foreach ($cartItems as $item) {
        //     $cartItemQuantities[$item['product_id']] = $item['quantity'];
        // }

        // $total_price = 0;
        // foreach ($products as $product) {
        //     $price = $product->discount_price ?? $product->price; 
        //     $quantity = $cartItemQuantities[$product->id] ?? 0;
        //     $total_price += $price * $quantity;
        // }

        return [
            'count' => WishListHelper::getCount(),
            // 'total' => $total_price,
            'items' => $wishlistItems,
            'products' => ProductResource::collection($products),
        ];

    }
}
