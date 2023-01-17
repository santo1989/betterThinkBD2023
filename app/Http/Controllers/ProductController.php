<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        $productList = Product::latest()->get();


        // if ($request->has('category_id')) {
        //     $productsCollection->where('category_id', $request->category_id);
        // }

        // if (request('search')) {
        //     $productsCollection = $productsCollection
        //         ->where('description', 'like', '%' . request('search') . '%')
        //         ->orwhere('title', 'like', '%' . request('search') . '%');
        // }


        return view('backend.products.index', [
            'productList' => $productList,
            'categories' => $categories,
        ]);
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
                'logo'=> $this->uploadImage1(request()->file('logo')),
                'image'=> $this->uploadImage(request()->file('image')),
                'short_address'=> $request->short_address,
                'long_address'=> $request->long_address,
                'description1'=> $request->description1,
                'description2' => $request->description2,
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
                'short_address' => $request->short_address,
                'long_address' => $request->long_address,
                'description1' => $request->description1,
                'description2' => $request->description2,
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

            if ($request->hasFile('logo')) {
                if ($product->logo==!null) {
                    unlink(public_path('images/products/' . $product->logo));
                }
                $requestData['logo'] = $this->uploadImage1(request()->file('logo'));
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
            unlink(public_path('images/products/' . $product->logo));
            return redirect()->route('products.index')->withMessage('Successfully Deleted!');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    public function uploadImage1($image)
    {
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('images/products'), $imageName);
        return $imageName;
    }

    public function uploadImage($image)
    {
        sleep(1);
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('images/products'), $imageName);
        return $imageName;
    }

}
