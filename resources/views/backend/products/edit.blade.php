<x-backend.layouts.master>
    <x-slot name="pageTitle">
        Edit Products
    </x-slot>

    <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> Products </x-slot>

            <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit</li>

        </x-backend.layouts.elements.breadcrumb>
    </x-slot>


    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Edit Products <a class="btn btn-sm btn-info" href="{{ route('products.index') }}">List</a>
        </div>

        <div class="card-body">

            <x-backend.layouts.elements.errors :errors="$errors" />

            <form action="{{ route('products.update', ['product' => $product->id]) }}" enctype="multipart/form-data"
                method="post">
                @csrf
                @method('patch')

                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select name="category_id" class="form-control">
                        <option value="">Select</option>
                        @foreach ($categories as $category)
                            <option value={{ $category->id }}
                                {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->title }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- <div class="form-group">
                    <label for="title">Product Name</label>
                    <input type="text" name="title" class="form-control" placeholder="Enter Product Name" value="{{ $product->title }}">
                </div> --}}

                <x-backend.form.input name="title" label="Product Name" :value="$product->title" />

                <x-backend.form.textarea name="description" label="Description">
                    {{ $product->description }}
                </x-backend.form.textarea>

                <x-backend.form.input name="image" type="file" label="Image" :value="$product->image" />

                <x-backend.form.input name="discount_amount" label="Discount Amount" :value="$product->discount_amount" />

                <x-backend.form.input name="point_needed" label="Point Needed" :value="$product->point_needed" />

                <x-backend.form.button>Update</x-backend.form.button>

            </form>
        </div>
    </div>


</x-backend.layouts.master>
