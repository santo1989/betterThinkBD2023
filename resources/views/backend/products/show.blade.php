<x-backend.layouts.master>
    <x-slot name="pageTitle">
        Details
    </x-slot>

    <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> Products </x-slot>

            <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Details</li>

        </x-backend.layouts.elements.breadcrumb>
    </x-slot>


    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Product Details <a class="btn btn-sm btn-info" href="{{ route('products.index') }}">List</a>
        </div>
        <div class="card-body">
            <h3>Title: {{ $product->title }}</h3>
            <h3>Catagory: {{ $product->category->title }}</h3>
            <p>Description: {{ $product->description }}</p>
            <p>Address: {{ $product->short_address }}</p>
            <p>Full Address: {{ $product->long_address }}</p>
            <p>Company Image: <img src="{{ asset('images/products/' . $product->image) }}" alt=""></p>
            <p>Logo: <img src="{{ asset('images/products/' . $product->logo) }}" alt=""></p>
            <p>Discount %: {{ $product->discount_amount }}</p>
            <p>Point: {{ $product->point_needed }}</p>
        </div>
    </div>


</x-backend.layouts.master>
