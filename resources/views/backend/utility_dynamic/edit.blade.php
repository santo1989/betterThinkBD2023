<x-backend.layouts.master>
    <x-slot name="pageTitle">
        Utility
    </x-slot>

    <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> Utility </x-slot>

            <li class="breadcrumb-item"><a href="{{ route('utility_dynamic.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Index</li>

        </x-backend.layouts.elements.breadcrumb>
    </x-slot>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Utility


        </div>
        <x-backend.layouts.elements.errors :errors="$errors" />

        <x-backend.layouts.elements.message :message="session('message')" />

        <div class="card-body">
            <div class="container">
                <form action="{{ route('utility_dynamic.update', $utilityDynamic->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ $utilityDynamic->name }}">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description">{{ $utilityDynamic->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="picture">Picture</label>
                        <input type="file" class="form-control" id="picture" name="picture">
                        <img src="{{ asset('images/utilityDynamic' . $utilityDynamic->picture) }}" width="50">
                    </div>
                    <div class="form-group">
                        <label for="type_of_placement">Type of Placement</label>
                        {{-- <input type="text" class="form-control" id="type_of_placement" name="type_of_placement"
                            value="{{ $utilityDynamic->type_of_placement }}"> --}}
                        <select name="type_of_placement" id="type_of_placement" class="form-control">
                            <option value="1" {{ $utilityDynamic->type_of_placement == 1 ? 'selected' : '' }}>Home page Logo</option>
                            <option value="2" {{ $utilityDynamic->type_of_placement == 2 ? 'selected' : '' }}>Galary</option>
                            <option value="3" {{ $utilityDynamic->type_of_placement == 3 ? 'selected' : '' }}>About us</option>
                            <option value="4" {{ $utilityDynamic->type_of_placement == 4 ? 'selected' : '' }}>Contact us</option>
                            
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</x-backend.layouts.master>
