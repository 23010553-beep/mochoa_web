<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    // /danh-muc/{slug}
    public function byCategory(string $slug)
    {
        $cat = Category::where('slug', $slug)->firstOrFail();

        $sort = request('sort');
        $products = $cat->products()
            ->when($sort === 'price_asc',  fn($q) => $q->orderByRaw('COALESCE(sale_price, price) ASC'))
            ->when($sort === 'price_desc', fn($q) => $q->orderByRaw('COALESCE(sale_price, price) DESC'))
            ->paginate(12);

        return view('category', compact('cat', 'products'));
    }

    // /san-pham/{id}
    public function show(int $id)
    {
        $p = Product::findOrFail($id);
        return view('product_detail', compact('p'));
    }
}
