<x-backend.layouts.master>

    <x-slot name="pageTitle">
        Admin Dashboard
    </x-slot>

    <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> Dashboard</x-slot>
            <li class="breadcrumb-item active">Dashboard</li>
        </x-backend.layouts.elements.breadcrumb>
    </x-slot>

    @if (session('message'))
        <div class="alert alert-success">
            <span class="close" data-dismiss="alert">&times;</span>
            <strong>{{ session('message') }}.</strong>
        </div>
    @endif

    {{-- notification --}}
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @foreach (Auth::user()->notifications as $item)
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">{{ \App\Models\User::find($item->child_id)->uuid }}</h4>
                        <p>{{ $item->message }}</p>
                        <hr>
                        <a href="{{ route('approvePage',['notification' => $item]) }}" type="button"
                           class="btn btn-success">Approved Request</a>
                        <a type="button" class="btn btn-danger" href="{{ route('is_rejected') }}">Decline Request</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    {{-- end notification --}}

</x-backend.layouts.master>
