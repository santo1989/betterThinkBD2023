<x-backend.layouts.master>
    <x-slot name="pageTitle">
        Edit Form
    </x-slot>

    <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> Categories </x-slot>

            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit</li>

        </x-backend.layouts.elements.breadcrumb>
    </x-slot>


    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Edit Category <a class="btn btn-sm btn-info" href="{{ route('categories.index') }}">List</a>
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

            <form action="{{ route('categories.update', ['category' => $category->id]) }}" method="post">
                @csrf
                @method('patch')

                <x-backend.form.input name="title" type="text" label="Product Name"
                    value="{{ $category->title }}" />

                <x-backend.form.textarea name="description" type="text" label="Description"
                    value="{{ $category->description }}" />

                <x-backend.form.input name="image" type="file" label="Image" value="{{ $category->image }}" />
                {{-- <div class="form-floating mb-3 mb-md-0">
                    <input name="title" class="form-control" id="inputTitle" type="text"
                        placeholder="Enter your title" value="{{ old('title', $category->title) }}">
                    <label for="inputTitle">Title</label>

                    @error('title')
                        <span class="small text-danger">{{ $message }}</span>
                    @enderror

                </div>

                <div class="form-floating mt-3">
                    <textarea name="description" class="form-control" id="inputDescription" placeholder="Description">
                    {{ old('description', $category->description) }}
                    </textarea>
                    <label for="inputDescription">Description</label>

                    @error('description')
                        <span class="small text-danger">{{ $message }}</span>
                    @enderror

                </div>

                <div class="form-floating mt-3">
                    <input name="image" class="form-control" id="inputImage" type="file"
                        placeholder="Enter your image" value="{{ old('image', $category->image) }}">
                    <label for="inputImage">Image</label>

                    @error('image')
                        <span class="small text-danger">{{ $message }}</span>
                    @enderror

                </div> --}}

                <div class="mt-4 mb-0">
                    <button type="submit" class="btn btn-primary">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>


</x-backend.layouts.master>
