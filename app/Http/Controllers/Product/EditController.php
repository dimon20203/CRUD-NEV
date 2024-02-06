<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Group;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Models\Product;
class EditController extends Controller
{
    public function __invoke($id)
    {
        $product = Product::findOrFail($id); // or Product::find($id);

        $tags = Tag::all();
        $colors = Color::all();
        $categories = Category::all();
        $groups = Group::all();

        return view('product.edit', compact('tags', 'colors', 'categories', 'product','groups'));
    }
}

