<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();

        $productsCollection = Product::latest();


        if ($request->has('category_id')) {
            $productsCollection->where('category_id', $request->category_id);
        }

        if (request('search')) {
            $productsCollection = $productsCollection
                ->where('description', 'like', '%' . request('search') . '%')
                ->orwhere('title', 'like', '%' . request('search') . '%');
        }

        $products = $productsCollection->paginate(10);


        return view('backend.products.index', [
            'products' => $products
        ])->with('categories', $categories);
    }

    public function create()
    {
        $categories = Category::all();
        return view('backend.products.create', compact('categories'));
    }

    public function store(request $request)
    {

        try {
            Product::create([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $this->uploadImage(request()->file('image')),
                'discount_amount' => $request->discount_amount,
                'point_needed' => $request->point_needed,
                'category_id' => $request->category_id,

            ]);

            return redirect()->route('products.index')->withMessage('Successfully Created!');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    public function show(Product $product)
    {
        return view('backend.products.show', [
            'product' => $product
        ]);
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('backend.products.edit', [
            'product' => $product,
            'categories' => $categories,
        ]);
    }


    public function update(request $request, Product $product)
    {
        try {


            $requestData = [
                'title' => $request->title,
                'description' => $request->description,
                'discount_amount' => $request->discount_amount,
                'point_needed' => $request->point_needed,
                'category_id' => $request->category_id,
            ];

            if ($request->hasFile('image')) {
                if ($product->image==!null) {
                    unlink(public_path('images/products/' . $product->image));
                }
                $requestData['image'] = $this->uploadImage(request()->file('image'));
            }

            $product->update($requestData);


            return redirect()->route('products.index')->withMessage('Successfully Updated!');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    public function destroy(Product $product)
    {
        try {
            $product->delete();
            unlink(public_path('images/products/' . $product->image));
            return redirect()->route('products.index')->withMessage('Successfully Deleted!');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    public function uploadImage($image)
    {
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('images/products'), $imageName);
        return $imageName;
    }
}
