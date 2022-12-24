<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('frontend.index', compact('categories', 'products'));
    }

    public function category_details($id)
    {
        $products = Product::where('category_id', $id)->get();
        return view('frontend.product', compact('products'));
    }

    public function product_details($id)
    {
        $product = Product::find($id);
        return view('frontend.product-details', compact('product'));
    }

    public function blog_details()
    {
        $blogs = Blog::latest()->get();
        return view('frontend.blog-details', compact('blogs'));
    }
}
