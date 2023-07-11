<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::with('category')->filter($request->query())->orderByDesc('created_at')->get();
        return view('front.products.shop',compact('products'));
    }
    public function show(Product $product)
    {
        return view('front.products.show',compact('product'));
    }
}
