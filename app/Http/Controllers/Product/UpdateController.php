<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Product $product)
    {
        $data = $request->validated();

        if ($request->hasFile('preview_image')) {
            $data['preview_image'] = $request->file('preview_image')->store('/images', 'public');
        }

        $product->update(Arr::except($data, ['tags', 'colors', 'product_images']));

        // Handle tags and colors
        if (isset($data['tags'])) {
            $product->tags()->sync($data['tags']);
        }

        if (isset($data['colors'])) {
            $product->colors()->sync($data['colors']);
        }

        // Process updating existing and creating new product images
        $productImages = $request->file('product_images');

        if ($productImages) {
            foreach ($productImages as $newProductImage) {
                if ($newProductImage) {
                    $path = $newProductImage->store('/images', 'public');
                    // Если есть старая картинка, удаляем её
                    if ($product->productImages()->exists()) {
                        $product->productImages()->first()->delete();
                    }
                    // Создаем новую запись с новым путем к файлу
                    ProductImage::create([
                        'product_id' => $product->id,
                        'file_path' => $path
                    ]);
                }
            }
        }

        return redirect()->route('product.index');
    }
}
