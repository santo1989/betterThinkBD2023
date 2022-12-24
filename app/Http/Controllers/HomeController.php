<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function productForntend()
    {
        $products = Product::where('category_id', 1)->get();
        return view('frontend.product', compact('products'));
    }
}
