<x-backend.layouts.master>
    <x-slot name="pageTitle">
        Add New Blogs
    </x-slot>

    <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> Blogs </x-slot>

            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Add New</li>

        </x-backend.layouts.elements.breadcrumb>
    </x-slot>


    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Create Blogs <a class="btn btn-sm btn-info" href="{{ route('blogs.index') }}">List</a>
        </div>
        <div class="card-body">
            <x-backend.layouts.elements.errors :errors="$errors" />



            <form action="{{ route('blogs.store') }}" enctype="multipart/form-data" method="post">
                @csrf

                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                <x-backend.form.input name="title" type="text" label="Title" />

                <x-backend.form.textarea name="post" type="text" label="Post" />

                <x-backend.form.input name="image" type="file" label="Image" />

                <x-backend.form.input name="author" type="text" label="Author Name" />

                <x-backend.form.button>Save</x-backend.form.button>


            </form>
        </div>
    </div>


</x-backend.layouts.master>
