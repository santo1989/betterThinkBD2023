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
           Withdraw Point History <a class="btn btn-sm btn-info" href="{{ route('history_withdraw') }}">History</a>
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
                @if (session('message'))
                    <div class="alert alert-success">
                        <span class="close" data-dismiss="alert">&times;</span>
                        <strong>{{ session('message') }}</strong>
                    </div>
                @endif

                @php
                    $point = Auth::user()->point;
                    // dd($point)
                @endphp
                @if ($point < 0 || $point == null)
                    <div class="alert alert-danger">
                        <ul>
                            <li>Sorry! You can't withdraw point. You have to earn point first.</li>
                        </ul>
                    </div>
                @else

            <form action="{{ route('point.withdraw') }}" method="post">
                @csrf
                <x-backend.form.input name="point" type="number" label="Point" />

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Select Payment Method</label>
                    <select name="method" class="form-control" id="exampleFormControlSelect1">
                        <option>Bank</option>
                        <option>Mobile</option>
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
