<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ShowController extends Controller
{
    public function __invoke(Product $product)
    {

        $colors = $product->colors;
        $category = $product->category;
        $group = $product->groups;
        $tags = $product->tags;
        // Check if $category is not null before looping
        $categories = $category ? [$category] : [];
        $groups = $group ? [$group] : [];
        return view('product.show',compact('colors','product','categories','tags','groups'));
    }
}
