<x-backend.layouts.master>
           <x-slot name="pageTitle">
          Withdraw History
      </x-slot>

      <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader">Withdraw Point </x-slot>
            <li class="breadcrumb-item">Withdraw Point</li>
            <li class="breadcrumb-item active">Withdraw History</li>
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
  
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  {{-- Table goes here --}}
  
                  <table id="datatablesSimple" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Details</th>
                <th scope="col">From</th>
                <th scope="col">Point</th>
                <th scope="col">Date</th>
            </tr>
            </thead>
            <tbody>
            @foreach($withdraws as $withdraw)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $withdraw->details }}</td>
                    <td>{{ $withdraw->payment_id }}</td>
                    <td>{{ $withdraw->point }}</td>
                    <td>{{ $withdraw->created_at }}</td>
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
