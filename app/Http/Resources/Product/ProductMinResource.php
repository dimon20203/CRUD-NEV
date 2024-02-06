<?php

namespace App\Http\Resources\Product;

use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Color\ColorResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductMinResource extends JsonResource
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
            'description' => $this->description,
            'content' => $this->content,
            'price' => $this->price,
            'old_price'=> $this->old_price,
            'count' => $this->count,
            'is_published' => $this->is_published,
            'category' => new CategoryResource ($this->category),
            //'image_url' => $this->imageUrl,
            'image_url' => url('storage/' . $this->preview_image),
            'colors' => ColorResource::collection($this->colors),


        ];
    }
}
