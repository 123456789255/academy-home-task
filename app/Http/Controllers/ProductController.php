<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function show(product $product)
    {
        return view('product', compact('product'));
    }

    public function about()
    {
        $products = Product::orderBy('created_at', 'desc')->limit(5)->get();
        return view('welcome', compact('products'));
    }
}
