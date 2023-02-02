<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\district;
use App\Models\division;
use App\Models\Product;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        $productList = Product::latest()->get();

        $divisions = division::all();


        return view('backend.Admin.products.index', [
            'productList' => $productList,
            'categories' => $categories,
            'divisions' => $divisions,
        ]);
    }

    public function create()
    {
        $categories = Category::all();
        $divisions = division::all();
        $districts = district::all();
        return view('backend.Admin.products.create', compact('categories', 'divisions', 'districts'));
    }

    public function store(request $request)
    {

        try {
            Product::create([
                'title' => $request->title,
                'logo' => $this->uploadImage1(request()->file('logo')),
                'image' => $this->uploadImage(request()->file('image')),
                'short_address' => $request->short_address,
                'long_address' => $request->long_address,
                'description1' => $request->description1,
                'description2' => $request->description2,
                'discount_amount' => $request->discount_amount,
                'division_id' => $request->division_id,
                'district_id' => $request->district_id,
                'category_id' => $request->category_id,

            ]);

            return redirect()->route('products.index')->withMessage('Successfully Created!');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    public function show(Product $product)
    {
        return view('backend.Admin.products.show', [
            'product' => $product
        ]);
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('backend.Admin.products.edit', [
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
                'division_id' => $request->division_id,
                'district_id' => $request->district_id,
                'category_id' => $request->category_id,
            ];

            if ($request->hasFile('image')) {
                if ($product->image == !null) {
                    unlink(public_path('images/products/' . $product->image));
                }
                $requestData['image'] = $this->uploadImage(request()->file('image'));
            }

            if ($request->hasFile('logo')) {
                if ($product->logo == !null) {
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

    public function product_search(Request $request)
    {
        $search = $request->get('search');
        $productList = Product::where('title', 'like', '%' . $search . '%')->get();
        return view('frontend.ProductSearch', ['productList' => $productList]);
    }

    public function product_division_search(Request $request)
    {
        // dd($request->all());
        $search = $request->get('search');
        $productList = Product::where('division_id', 'like', '%' . $search . '%')->get();
        return view('frontend.ProductSearch', ['productList' => $productList]);
    }

    public function getDistricts($id)
    {
        // dd($id);
        $districts = district::where('division_id', $id)->get();
        return response()->json($districts);
    }
}
