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
                <h1>{{ $utilityDynamic->name }}</h1>
                <p><strong>Description:</strong> {{ $utilityDynamic->description }}</p>
                <p><strong>Type of Placement:</strong> {{ $utilityDynamic->type_of_placement }}</p>
                <img src="{{ asset('images/utilityDynamic' . $utilityDynamic->picture) }}" width="50">
                <a href="{{ route('utility_dynamic.edit', $utilityDynamic->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('utility_dynamic.destroy', $utilityDynamic->id) }}" method="POST"
                    class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</x-backend.layouts.master>
