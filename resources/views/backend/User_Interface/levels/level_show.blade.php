<x-backend.layouts.master>
    <div class="container">

    
     <div class="text-center pt-3 pb-3">
        <div class="badge badge-info ">
        <h5 >Levels under {{ Auth::user()->name }}</h5>
        </div>
        
                
       
    </div>
    @if (session('message'))
        <div class="alert alert-success">
            <span class="close" data-dismiss="alert">&times;</span>
            <strong>{{ session('message') }}.</strong>
        </div>
    @endif
<div class="text-center">
    <div class="card mb-4 text-center">
        <div class="card-header">
            <div class="badge badge-primary">
                <h5>Level 1</h5>
            </div>

            @isset($parent)
                <div class="card" style="width:18rem;">
                    <img src="{{ asset('images/users/'.Auth::user()->picture) }}" class="card-img-top rounded-circle" height="100px" width="100px" alt="{{ Auth::user()->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $parent_details->name }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted ">{{ $parent_details->point }}</h6>
                    </div>
                </div>
            @endisset
        </div>
        <div class="card-body">
            <div class="badge badge-primary">
                <h5>Level 2</h5>
            </div>
        @isset($child_details)
        @forelse ($child_details as $child_details)
            <div class="card" style="width:18rem;">
                    <img src="{{ asset('images/users/'.$child_details->picture) }}" class="card-img-top rounded-circle" height="100px" width="100px" alt="{{ $child_details->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $child_details->name }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted ">{{ $child_details->point }}</h6>
                    </div>
                </div>
        @empty

        <div class="card" style="width:18rem;">
            <div class="card-body">
                <h5 class="card-title">No Child</h5>
                <h6 class="card-subtitle mb-2 text-muted ">No Child</h6>
            </div>
        </div>
            
        @endforelse
                
            @endisset
      

 
        </div>
    </div>
    </div>
</div>
</x-backend.layouts.master>
