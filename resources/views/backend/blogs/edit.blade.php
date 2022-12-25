<x-backend.layouts.master>
    <x-slot name="pageTitle">
        Edit Blogs
    </x-slot>

    <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> Blogs </x-slot>

            <li class="breadcrumb-item"><a href="{{ route('blogs.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit</li>

        </x-backend.layouts.elements.breadcrumb>
    </x-slot>


    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Edit Blogs <a class="btn btn-sm btn-info" href="{{ route('blogs.index') }}">List</a>
        </div>

        <div class="card-body">

            <x-backend.layouts.elements.errors :errors="$errors" />

            <form action="{{ route('blogs.update', ['blog' => $blog->id]) }}" enctype="multipart/form-data"
                method="post">
                @csrf
                @method('patch')

                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                <x-backend.form.input name="title" type="text" label="Title" :value="$blog->title" />

                <x-backend.form.textarea name="post" type="text" label="Post" :value="$blog->post" />

                <x-backend.form.input name="image" type="file" label="Image" :value="$blog->image" />

                <x-backend.form.input name="author" type="text" label="Author Name" :value="$blog->author" />

                <x-backend.form.button>Update</x-backend.form.button>

            </form>
        </div>
    </div>


</x-backend.layouts.master>
