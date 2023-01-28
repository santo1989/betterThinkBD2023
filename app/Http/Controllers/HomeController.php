<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\division;
use App\Models\Notification;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::all();
        $divisions = division::all();
        return view('frontend.index', compact('categories', 'products', 'divisions'));
    }

    public function category_details($id)
    {
        $products = Product::where('category_id', $id)->get();
        $divisions = division::all();
        return view('frontend.product', compact('products', 'divisions'));
    }

    public function product_details($id)
    {
        $product = Product::find($id);
        return view('frontend.product-details', compact('product'));
    }

    public function blogs()
    {
        $blogs = Blog::latest()->get();
        return view('frontend.blog', compact('blogs'));
    }

    public function blog_details($id)
    {
        $blog = Blog::find($id);
        return view('frontend.blog-details', compact('blog'));
    }

    public function services()
    {
            return view('frontend.services');
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function contactUS()
    {
        return view('frontend.contact-us');
    }
}
