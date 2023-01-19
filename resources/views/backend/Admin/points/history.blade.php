<x-backend.layouts.master>
    <x-slot name="pageTitle">
        History
    </x-slot>

    @if (session('message'))
        <div class="alert alert-success">
            <span class="close" data-dismiss="alert">&times;</span>
            <strong>{{ session('message') }}.</strong>
        </div>
    @endif

    <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> History </x-slot>

            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">History</li>

        </x-backend.layouts.elements.breadcrumb>
    </x-slot>


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="datatablesSimple" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Sl#</th>
                            <th>Details</th>
                            <th>Point</th>
                            <th>Type</th>

                        </tr>
                        </thead>
                        <tbody>
                        @php $sl=0 @endphp
                        @foreach ($histories as $history)
                            <tr>
                                <td>{{ ++$sl }}</td>
                                <td>{{ $history->details }}</td>
                                <td>{{ $history->point }}</td>
                                <td>{{ \App\Enums\PaymentType::from($history->type)->getKey() }}</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->


            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>

</x-backend.layouts.master>
