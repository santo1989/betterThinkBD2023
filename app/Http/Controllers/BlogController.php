<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {

        $blogs = Blog::orderBy('id', 'desc')->get();
        return view('backend.Admin.blogs.index', [
            'blogs' => $blogs
        ]);
    }

    public function create()
    {
        return view('backend.Admin.blogs.create');
    }

    public function store(request $request)
    {

        try {
            Blog::create([
                'title' => $request->title,
                'post' => $request->post,
                'image' => $this->uploadImage(request()->file('image')),
                'user_id' => $request->user_id,
                'author' => $request->author,
            ]);

            return redirect()->route('blogs.index')->withMessage('Successfully Created!');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    public function show(Blog $blog)
    {
        return view('backend.Admin.blogs.show', [
            'blog' => $blog
        ]);
    }

    public function edit(Blog $blog)
    {
        return view('backend.Admin.blogs.edit', [
            'blog' => $blog,
        ]);
    }


    public function update(request $request, Blog $blog)
    {
        try {


            $requestData = [
                'title' => $request->title,
                'post' => $request->post,
                'user_id' => $request->user_id,
                'author' => $request->author,
            ];

            if ($request->hasFile('image')) {
                if ($blog->image == !null) {
                    unlink(public_path('images/blogs/' . $blog->image));
                }
                $requestData['image'] = $this->uploadImage(request()->file('image'));
            }

            $blog->update($requestData);


            return redirect()->route('blogs.index')->withMessage('Successfully Updated!');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    public function destroy(Blog $blog)
    {
        try {
            $blog->delete();
            unlink(public_path('images/blogs/' . $blog->image));
            return redirect()->route('blogs.index')->withMessage('Successfully Deleted!');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    public function uploadImage($image)
    {
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('images/blogs'), $imageName);
        return $imageName;
    }
}
