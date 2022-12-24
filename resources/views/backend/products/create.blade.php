<x-backend.layouts.master>
    <x-slot name="pageTitle">
        Add New Products
    </x-slot>

    <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> Products </x-slot>

            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Add New</li>

        </x-backend.layouts.elements.breadcrumb>
    </x-slot>


    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Create Products <a class="btn btn-sm btn-info" href="{{ route('products.index') }}">List</a>
        </div>
        <div class="card-body">
            <x-backend.layouts.elements.errors :errors="$errors" />



            <form action="{{ route('products.store') }}" enctype="multipart/form-data" method="post">
                @csrf

                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select name="category_id" class="form-control">
                        <option value="">Select</option>
                        @foreach ($categories as $category)
                            <option value={{ $category->id }}>{{ $category->title }}</option>
                        @endforeach
                    </select>
                </div>
                {{-- <select name="category_id" class="form-control">
                    <option value="">Select</option>
                    @foreach ($categories as $category)
                    <option value={{ $category->id }}>{{ $category->title }}</option>
                    @endforeach
                </select>
                <br/> --}}

                {{-- <div class="form-group">
                    <label for="title">Product Name</label>
                    <input type="text" name="title" class="form-control" placeholder="Enter Product Name">
                </div> --}}

                <x-backend.form.input name="title" type="text" label="Product Name" />

                <x-backend.form.textarea name="description" type="text" label="Description" />

                <x-backend.form.input name="image" type="file" label="Image" />

                <x-backend.form.input name="discount_amount" type="number" label="Discount Amount" />

                <x-backend.form.input name="point_needed" type="number" label="Point Needed" />

                <x-backend.form.button>Save</x-backend.form.button>


            </form>
        </div>
    </div>


</x-backend.layouts.master>
