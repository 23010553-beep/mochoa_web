<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'categories' => Category::all(),
            'products'   => Product::latest()->take(6)->get(),
        ]);
    }
}
