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

            <a class="btn btn-sm btn-info" href="{{ route('utility_dynamic.create') }}">Add New</a>
        </div>
        <x-backend.layouts.elements.errors :errors="$errors" />

        <x-backend.layouts.elements.message :message="session('message')" />

        <div class="card-body">

            <table id="datatablesSimple">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Picture</th>
                <th>Type of Placement</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($utilityDynamics as $utilityDynamic)
            <tr>
                <td>{{ $utilityDynamic->name }}</td>
                <td>{{ $utilityDynamic->description }}</td>
                <td><img src="{{ asset('images/utilityDynamic/'.$utilityDynamic->picture) }}"  height="100px" width="100px"></td>
                <td>{{ $utilityDynamic->type_of_placement }}</td>
                <td>
                    <a href="{{ route('utility_dynamic.show', $utilityDynamic->id) }}" class="btn btn-primary">View</a>
                    <a href="{{ route('utility_dynamic.edit', $utilityDynamic->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('utility_dynamic.destroy', $utilityDynamic->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
  </div>
    </div>
</x-backend.layouts.master>
