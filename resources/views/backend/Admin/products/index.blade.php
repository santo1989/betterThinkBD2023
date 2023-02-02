<x-backend.layouts.master>
    <x-slot name="pageTitle">
        Products
    </x-slot>

    <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> Products </x-slot>

            <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Index</li>

        </x-backend.layouts.elements.breadcrumb>
    </x-slot>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Products

            <a class="btn btn-sm btn-info" href="{{ route('products.create') }}">Add New</a>
        </div>
        <x-backend.layouts.elements.errors :errors="$errors" />

        <x-backend.layouts.elements.message :message="session('message')" />

        <div class="card-body">

            <table id="datatablesSimple">

                <thead>
                    <tr>
                        <th>Sl#</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Address</th>
                        <th>Logo</th>
                        <th>Discount %</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $sl=0 @endphp
                    {{-- @dd($productList) --}}
                    @foreach ($productList as $product)
                    {{-- @dd($product) --}}
                        <tr>
                            <td>{{ ++$sl }}</td>
                            <td>{{ $product->title }}</td>
                            <td>{{ $product->category->title }}</td>
                            <td>{{ $product->short_address }}</td>
                            <td>
                                <img src="{{ asset('images/products/' . $product->logo) }}" alt="{{ $product->title }}"
                                    width="100" height="100">
                            </td>
                            <td>{{ $product->discount_amount }}</td>
                            <td>
                                <a class="btn btn-info btn-sm"
                                    href="{{ route('products.show', ['product' => $product->id]) }}">Show</a>

                                <a class="btn btn-warning btn-sm"
                                    href="{{ route('products.edit', ['product' => $product->id]) }}">Edit</a>
                                <form style="display:inline"
                                    action="{{ route('products.destroy', ['product' => $product->id]) }}"
                                    method="post">
                                    @csrf
                                    @method('delete')

                                    <button onclick="return confirm('Are you sure want to delete ?')"
                                        class="btn btn-sm btn-danger" type="submit">Delete</button>
                                </form>


                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

</x-backend.layouts.master>
