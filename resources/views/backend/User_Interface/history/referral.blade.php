<x-backend.layouts.master>
    <x-slot name="pageTitle">
        Referral History
    </x-slot>

    <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> Referral </x-slot>
            <li class="breadcrumb-item">Referral</li>
            <li class="breadcrumb-item active">Referral History</li>
        </x-backend.layouts.elements.breadcrumb>
    </x-slot>
    <section class="content">
        <div class="container-fluid">

            @if (session('message'))
                <div class="alert alert-success">
                    <span class="close" data-dismiss="alert">&times;</span>
                    <strong>{{ session('message') }}.</strong>
                </div>
            @endif

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4> Total Referral : {{ $referredUsers->count() ?? '0' }}</h4>
                            <div class="form-group">
                                <a href="{{ route('history.referral.export') }}" class="btn btn-outline-info btn-lg float-right">
                                    Export
                                </a>
                            </div>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            {{-- Table goes here --}}

                            <table id="datatablesSimple" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">UUID</th>
                                        <th scope="col">Created At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($referredUsers as $referral)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $referral->name }}</td>
                                            <td>{{ $referral->email }}</td>
                                            <td>{{ $referral->uuid }}</td>
                                            <td>{{ $referral->created_at }}</td>
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
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
</x-backend.layouts.master>
