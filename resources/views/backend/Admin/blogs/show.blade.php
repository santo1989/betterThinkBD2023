<x-backend.layouts.master>
    <x-slot name="pageTitle">
        Details
    </x-slot>

    <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> Blogs </x-slot>

            <li class="breadcrumb-item"><a href="{{ route('blogs.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Details</li>

        </x-backend.layouts.elements.breadcrumb>
    </x-slot>


    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Product Details <a class="btn btn-sm btn-info" href="{{ route('blogs.index') }}">List</a>
        </div>
        <div class="card-body">
            <h3>Title: {{ $blog->title }}</h3>
            <p>Post: {{ $blog->post }}</p>
            <p>Image: <img src="{{ asset('images/blogs/' . $blog->image) }}" alt=""></p>
            <p>Author: {{ $blog->author }}</p>
        </div>
    </div>


</x-backend.layouts.master>
