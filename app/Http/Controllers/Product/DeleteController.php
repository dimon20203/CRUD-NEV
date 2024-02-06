<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ColorProduct;
use App\Models\Product;
use App\Models\ProductTag;
use Illuminate\Support\Facades\Storage;

class DeleteController extends Controller
{
    public function __invoke(Product $product)
    {
        // Удалить связанные цвета
        $product->colors()->detach();

        // Удалить связанные теги
        $product->tags()->detach();

        // Удалить изображения продукта
        foreach ($product->productImages as $image) {
            Storage::disk('public')->delete($image->file_path);
            $image->delete();
        }

        // Удалить изображение предпросмотра продукта
        if ($product->preview_image) {
            Storage::disk('public')->delete($product->preview_image);
        }

        // Удалить сам продукт
        $product->delete();

        return redirect()->route('product.index');
    }
}
