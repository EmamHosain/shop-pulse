<?php

namespace App\Http\Resources;

use App\Helper\DateHelper;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
            'cat_name' => $this->cat_name,
            'cat_logo' => $this->cat_logo,
            'slug' => $this->slug,
            'productCount' => $this->products_count,
            'cat_slider' => $this->cat_slider,
            'isSliderForCarousel' => $this->isSliderForCarousel,
            'published' => $this->published,
            'created_at' => DateHelper::getFormatDate($this->created_at),
            'updated_at' => DateHelper::getFormatDate($this->updated_at),
        ];
    }
}
