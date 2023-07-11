<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest()->take(8)->get();
        $categories = Category::latest()->take(6)->get();
        return view('front.home',compact('products','categories'));
    }
    public function about()
    {
        $abouts = About::all();
        return view('front.about',compact('abouts'));
    }
}
