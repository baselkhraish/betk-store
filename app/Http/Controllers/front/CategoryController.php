<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('product')->orderByDesc('created_at')->get();
        return view('front.categories.index',compact('categories'));
    }
    public function show(Category $category)
    {
        return view('front.categories.show',compact('category'));
    }
}
