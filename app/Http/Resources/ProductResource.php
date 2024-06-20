<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'quantity' => $this->quantity,
            'short_description' => $this->short_description,
            'long_description' => $this->long_description,
            'price' => $this->price,
            'published' => $this->published,
            'inStock' => $this->inStock,
            'discount_percentage' => $this->discount_percentage,
            'discount_price'=>$this->discount_price,
            'discount_amount'=>$this->discount_amount,


            
            'productImages' => $this->whenLoaded('productImages', function () {
                return ProductImageResource::collection($this->productImages);
            }),
            // 'category_id' => $this->category_id,
            // 'category' => new CategoryResource($this->whenLoaded('category')),
            // 'brand_id' => $this->brand_id,
            // 'brand' => new BrandResource($this->whenLoaded('brand')),


            // 'created_at' => $this->created_at,
            // 'updated_at' => $this->updated_at,
        ];
    }
}
