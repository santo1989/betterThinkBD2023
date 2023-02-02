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
                <div class="form-group">
                    <label for="division_id">Division</label>
                    <select name="division_id" class="form-control">
                        <option value="">Select</option>
                        @foreach ($divisions as $division)
                            <option value={{ $division->id }}>{{ $division->name }}: {{ $division->bn_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="district_id">District</label>
                    <select name="district_id" class="form-control">
                        {{-- <option value="">Select</option>
                        @foreach ($districts as $district)
                            <option value={{ $district->id }}>{{ $district->name }}: {{ $district->bn_name }}</option>
                        @endforeach --}}
                    </select>
                </div>

                <x-backend.form.input name="title" type="text" label="Product Name" />

                <x-backend.form.textarea name="description1" type="text" label="Description of Product" />
                <x-backend.form.textarea name="description2" type="text" label="Description of Service by Us" />
                <x-backend.form.textarea name="short_address" type="text" label="Address of Company short" />
                <x-backend.form.textarea name="long_address" type="text" label="Company Location Full" />

                <x-backend.form.input name="image" type="file" label="Company Image" />
                <x-backend.form.input name="logo" type="file" label="Company Logo" />
                <x-backend.form.input name="discount_amount" type="number" label="Discount Amount %" />

                {{-- <x-backend.form.input name="point_needed" type="number" label="Point Needed for Buy" /> --}}

                <x-backend.form.button>Save</x-backend.form.button>


            </form>
        </div>
    </div>
<script>
    $(document).ready(function() {
        $('select[name="division_id"]').on('change', function() {
            var division_id = $(this).val();
            console.log(division_id);
            if (division_id) {
                $.ajax({
                    url: "{{ url('/get/district/') }}/" + division_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        $('select[name="district_id"]').empty();
                        // $.each(data, function(key, value) {
                        //     $('select[name="district_id"]').append('<option value="' + key + '">' + value + '</option>');
                        // });
                        data.forEach(element => {
                            $('select[name="district_id"]').append('<option value="' + element.id + '">' + element.name + '</option>');
                        });
                        
                    },
                });
            } else {
                alert('danger');
            }
        });
    });
</script>

</x-backend.layouts.master>
