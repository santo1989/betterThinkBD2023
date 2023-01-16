<x-backend.layouts.master>
    <x-slot name="pageTitle">
       Types Details
    </x-slot>

    <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> Types </x-slot>

            <li class="breadcrumb-item"><a href="{{ route('home')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Add New</li>

        </x-backend.layouts.elements.breadcrumb>
    </x-slot>


    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Type Details <a class="btn btn-sm btn-info" href="{{ route('types.index') }}">List</a>
        </div>
        <div class="card-body">
            <h3>Title: {{ $type->name }}</h3>
        </div>
    </div>


</x-backend.layouts.master>
