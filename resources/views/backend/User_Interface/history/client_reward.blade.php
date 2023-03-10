<x-backend.layouts.master>
           <x-slot name="pageTitle">
          Reward History
      </x-slot>

      <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader">Reward Point </x-slot>
            <li class="breadcrumb-item">Reward Point</li>
            <li class="breadcrumb-item active">Reward History</li>
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
            @foreach($client_rewards as $client_reward)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $client_reward->details }}</td>
                    <td>{{ $client_reward->payment_id }}</td>
                    <td>{{ $client_reward->point }}</td>
                    <td>{{ $client_reward->created_at }}</td>
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
