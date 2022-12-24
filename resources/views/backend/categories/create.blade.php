<x-backend.layouts.master>
    <x-slot name="pageTitle">
        Add Form
    </x-slot>

    <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> Categories </x-slot>

            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Add New</li>

        </x-backend.layouts.elements.breadcrumb>
    </x-slot>


    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Create Category <a class="btn btn-sm btn-info" href="{{ route('categories.index') }}">List</a>
        </div>
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('categories.store') }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="form-floating mb-3 mb-md-0">
                    <input name="title" class="form-control" id="inputTitle" type="text"
                        placeholder="Enter your title" value="{{ old('title') }}">
                    <label for="inputTitle">Title</label>

                    @error('title')
                        <span class="small text-danger">{{ $message }}</span>
                    @enderror

                </div>

                <div class="form-floating mt-3">
                    <textarea name="description" class="form-control" id="inputDescription" placeholder="Description">
                    {{ old('description') }}
                    </textarea>
                    <label for="inputDescription">Description</label>

                    @error('description')
                        <span class="small text-danger">{{ $message }}</span>
                    @enderror

                </div>

                <div class="form-floating mt-3">
                    <input name="image" class="form-control" id="inputImage" type="file"
                        placeholder="Enter your image" value="{{ old('image') }}">
                    <label for="inputImage">Image</label>

                    @error('image')
                        <span class="small text-danger">{{ $message }}</span>
                    @enderror

                </div>

                <div class="mt-4 mb-0">
                    <button type="submit" class="btn btn-primary">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>


</x-backend.layouts.master>
