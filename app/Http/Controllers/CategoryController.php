<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        return view('backend.categories.index', [
            'categories' => $categories
        ]);
    }

    public function create()
    {
        return view('backend.categories.create');
    }

    public function store(request $request)
    {

        try {
            $categories = Category::create([
                'title' => $request->title,
                'description' => $request->description,
            ]);

            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('/images/categories/'), $filename);
                $categoriesData['image'] = $filename;
            }

            $categories->update($categoriesData);



            return redirect()->route('categories.index')->withMessage('Successfully Created!');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }


    public function show(Category $category)
    {
        return view('backend.categories.show', [
            'category' => $category
        ]);
    }

    public function edit(Category $category)
    {
        return view('backend.categories.edit', [
            'category' => $category
        ]);
    }

    public function update(request $request, Category $category)
    {
        // dd($request->all());
        try {
            $requestData = [
                'title' => $request->title,
                'description' => $request->description,
            ];

            if($request->hasfile('image')) {
                unlink(public_path('images/categories/' . $category->image));
            }

            if ($request->hasfile('image')) {
                $file = $request->file('image');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('/images/categories/'), $filename);
                $requestData['image'] = $filename;
            }

            $category->update($requestData);



            return redirect()->route('categories.index')->withMessage('Successfully Updated!');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    public function destroy(Category $category)
    {
        try {
            $category->delete();
            unlink(public_path('images/categories/' . $category->image));
            $products = Product::where('category_id', $category->id)->get();
            foreach ($products as $product) {
                $product->delete();
                unlink(public_path('images/products/' . $product->image));
            }
            return redirect()->route('categories.index')->withMessage('Successfully Deleted!');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }
}
