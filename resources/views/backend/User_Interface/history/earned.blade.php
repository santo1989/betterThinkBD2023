<x-backend.layouts.master>
    <x-slot name="pageTitle">
          Earn History
      </x-slot>

      <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> Earn Point </x-slot>
            <li class="breadcrumb-item">Earn Point</li>
            <li class="breadcrumb-item active">Earn History</li>
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
                <th scope="col">Point</th>
                <th scope="col">Details</th>
                <th scope="col">Created At</th>
            </tr>
            </thead>
            <tbody>
            @foreach($earned as $earn)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $earn->point }}</td>
                    <td>{{ $earn->details }}</td>
                    <td>{{ $earn->created_at }}</td>
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
