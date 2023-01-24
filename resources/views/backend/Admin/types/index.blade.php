<x-backend.layouts.master>
    <x-slot name="pageTitle">
        Types
    </x-slot>

    <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> Types </x-slot>

            <li class="breadcrumb-item"><a href="{{ route('home')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Types</li>

        </x-backend.layouts.elements.breadcrumb>
    </x-slot>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            {{-- Types <a class="btn btn-sm btn-info" href="{{ route('types.create') }}">Add New</a> --}}
        </div>
        <div class="card-body">

            @if (session('message'))
            <div class="alert alert-success">
                <span class="close" data-dismiss="alert">&times;</span>
                <strong>{{ session('message') }}.</strong>
            </div>
            @endif

            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Sl#</th>
                        <th>Title</th>
                        <th>Point</th>
                    </tr>
                </thead>
                <tbody>
                    @php $sl=0 @endphp
                    @foreach ($types as $type)
                    <tr>
                        <td>{{ ++$sl }}</td>
                        <td>{{ str_replace("_", " ", $type->name) }}</td>
                        <td>
                            {{ $type->point->point }}
                            {{-- <a class="btn btn-info btn-sm" href="{{ route('types.show', ['type' => $type->id]) }}" >Show</a> --}}

                            {{-- <a class="btn btn-warning btn-sm" href="{{ route('types.edit', ['type' => $type->id]) }}" >Edit</a> --}}

                            {{-- <form style="display:inline" action="{{ route('types.destroy', ['type' => $type->id]) }}" method="post">
                                @csrf
                                @method('delete')

                                <button onclick="return confirm('All product of that types are also delete ! Are you sure want to delete ?')" class="btn btn-sm btn-danger" type="submit">Delete</button>
                            </form> --}}
                        </td>
                    </tr>
                    {{-- @break($sl==6) --}}
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

</x-backend.layouts.master>
