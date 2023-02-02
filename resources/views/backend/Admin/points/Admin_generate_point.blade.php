<x-backend.layouts.master>
    <x-slot name="pageTitle">
        Generate Point
    </x-slot>

    <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> Generate Point </x-slot>

            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Generate Point</li>

        </x-backend.layouts.elements.breadcrumb>
    </x-slot>


    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
           Generate Point History <a class="btn btn-sm btn-info" href="#">History</a>
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
                @php
                    $point = Auth::user()->point;
                @endphp
                @if ($point < 5000)
                    <div class="alert alert-danger">
                        <ul>
                            <li>Sorry! You point is less then 5,000 . You have to generate point now.</li>
                        </ul>
                    </div>
                @else    
                
            <form action="{{ route('Admin_generate_point.store') }}" enctype="multipart/form-data" method="post">
                @csrf

                <x-backend.form.input name="Generate_point" type="number" label="Point" />

                <span id="point_status"></span>

                

                <div class="mt-4 mb-0">
                    <button type="submit" class="btn btn-primary">
                        Save
                    </button>
                </div>
            </form>
            @endif
        </div>
    </div>
    
@push('js')
    <script>
        $(document).ready(function() {
            $('#Generate_point').keyup(function() {
                var point = $('#Generate_point').val();
                var point_status = $('#point_status');
                if (point < 5000) {
                    point_status.html('<span class="text-danger">Sorry! You point is less then 5,000 . You have to generate point now.</span>');
                } else {
                    point_status.html('<span class="text-success">You can generate point now.</span>');
                }
            });
        });

    </script>
    
@endpush

</x-backend.layouts.master>
