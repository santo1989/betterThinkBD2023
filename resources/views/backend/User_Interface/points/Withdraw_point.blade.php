<x-backend.layouts.master>
    <x-slot name="pageTitle">
        Withdraw Point
    </x-slot>

    <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> Withdraw Point </x-slot>

            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Withdraw Point</li>

        </x-backend.layouts.elements.breadcrumb>
    </x-slot>


    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
           Withdraw Point History <a class="btn btn-sm btn-info" href="#">History</a>
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
                @if ($point < 0)
                    <div class="alert alert-danger">
                        <ul>
                            <li>Sorry! You can't withdraw point. You have to earn point first.</li>
                        </ul>
                    </div>
                @else    
                
            <form action="{{ route('Withdraw_point.store') }}" enctype="multipart/form-data" method="post">
                @csrf

                <x-backend.form.input name="Withdraw_point" type="number" label="Point" />

                <span id="point_status"></span>

                

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Select Payment Method</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option>Bank</option>
                        <option>Mobile Banking</option>
                    </select>
                </div>

                

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
            $('#Withdraw_point').keyup(function() {
                var point = $('#Withdraw_point').val();
                var point_status = $('#point_status');
                if (point > {{ Auth::user()->point }}) {
                    point_status.html('<span class="text-danger">You don\'t have enough point</span>');
                } else {
                    point_status.html('<span class="text-success">You have enough point</span>');
                }
            });
        });

    </script>
    
@endpush

</x-backend.layouts.master>
