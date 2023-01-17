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
     {{-- 'title' => $this->faker->name,
            'description1' => $this->faker->paragraph,
            'description2' => $this->faker->paragraph,
            'short_address' => $this->faker->address,
            'long_address' => $this->faker->address,
            'point_needed' => $this->faker->numberBetween(1001, 2000),
            'discount_amount' => $this->faker->numberBetween(1, 100),

            'logo' => $this->faker->imageUrl(400, 300, 'cats', true, 'Faker', true),
            'image' => $this->faker->imageUrl(400, 300, 'cats', true, 'Faker', true),
            'category_id' => $this->faker->numberBetween(1, 10), --}}
                <x-backend.form.input name="title" type="text" label="Product Name" />

                <x-backend.form.textarea name="description1" type="text" label="Description of Product" />
                <x-backend.form.textarea name="description2" type="text" label="Description of Service by Us" />
                <x-backend.form.textarea name="short_address" type="text" label="Address of Company short" />
                <x-backend.form.textarea name="long_address" type="text" label="Company Location Full" />

                <x-backend.form.input name="image" type="file" label="Company Image" />
                <x-backend.form.input name="logo" type="file" label="Company Logo" />
                <x-backend.form.input name="discount_amount" type="number" label="Discount Amount %" />

                <x-backend.form.input name="point_needed" type="number" label="Point Needed for Buy" />

                <x-backend.form.button>Save</x-backend.form.button>


            </form>
        </div>
    </div>


</x-backend.layouts.master>
