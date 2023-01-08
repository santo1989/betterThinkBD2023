<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
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

    public function is_approved_sponsor_page($id)
    {
        // dd($id);
        $sponser = Notification::where('id', $id)->get()->first();
        // dd($sponser);
        $sponser_details = User::where('sponsor_id', $sponser->name)->get()->first();
        // dd($sponser_details);
        return view('backend.approved.is_approved_sponsor_page', compact('sponser', 'sponser_details'));
    }

    public function is_approved_payment_page($id)
    {
        $payment = Notification::where('id', $id)->get();
        $user_payment_details = User::where('payment_id', $payment->name)->get();
        return view('backend.approved.is_approved_payment_page', compact('payment', 'user_payment_details'));
    }

    public function is_approved_sponsor_payment_page($id)
    {
        $sponsor_payment = Notification::where('id', $id)->get();
        $user_sponsor_payment_details = User::where('payment_id', $sponsor_payment->name)->where('sponsor_id', $sponsor_payment->name)->get();
        return view('backend.approved.is_approved_sponsor_payment_page', compact('sponsor_payment', 'user_sponsor_payment_details'));
    }


}
