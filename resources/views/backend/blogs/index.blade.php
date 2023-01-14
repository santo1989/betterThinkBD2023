<x-backend.layouts.master>
    <x-slot name="pageTitle">
        Blogs
    </x-slot>

    <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> Blogs </x-slot>

            <li class="breadcrumb-item"><a href="{{ route('blogs.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Index</li>

        </x-backend.layouts.elements.breadcrumb>
    </x-slot>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Blogs

            <a class="btn btn-sm btn-info" href="{{ route('blogs.create') }}">Add New</a>
        </div>
        <x-backend.layouts.elements.errors :errors="$errors" />

        <x-backend.layouts.elements.message :message="session('message')" />

        <div class="card-body">

            <table id="datatablesSimple">

                <thead>
                    <tr>
                        <th>Sl#</th>
                        <th>Blog Title</th>
                        <th>Post</th>
                        <th>Image</th>
                        <th>Author</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $sl=0 @endphp
                    @foreach ($blogs as $blog)
                        {{-- @dd($blog) --}}
                        <tr>
                            <td>{{ ++$sl }}</td>
                            <td>{{ $blog->title }}</td>
                            <td>{{ $blog->post }}</td>
                            <td>
                                <img src="{{ asset('images/blogs/' . $blog->image) }}" alt="{{ $blog->title }}"
                                    width="100" height="100">
                            </td>
                            <td>{{ $blog->author }}</td>
                            <td>
                                <a class="btn btn-info btn-sm"
                                    href="{{ route('blogs.show', ['blog' => $blog->id]) }}">Show</a>

                                <a class="btn btn-warning btn-sm"
                                    href="{{ route('blogs.edit', ['blog' => $blog->id]) }}">Edit</a>
                                <form style="display:inline"
                                    action="{{ route('blogs.destroy', ['blog' => $blog->id]) }}" method="post">
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
