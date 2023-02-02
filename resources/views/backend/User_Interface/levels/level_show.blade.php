<x-backend.layouts.master>
    <div class="container">


        <div class="text-center pt-3 pb-3">
            <div class="badge badge-info ">
                <h5>Levels under {{ Auth::user()->name }}</h5>
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
                <div class="card-header pt-1 pb-1">
                    {{-- <div class="badge badge-primary pt-1 pb-1">
                        <h5>Level 1</h5>
                    </div> --}}

                    @isset($parent)
                        <div class="row justify-content-center pt-1 pb-1">
                            <div class="col-md-3 col-xl-3">
                                <div class="card" style="width:18rem;">
                                    <img src="{{ asset('images/users/' . Auth::user()->picture) }}"
                                        class="card-img-top rounded" height="100px" width="100px"
                                        alt="{{ Auth::user()->name }}">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $parent_details->name }}</h5>
                                        <h6 class="card-subtitle mb-2 text-muted ">{{ $parent_details->uuid }}</h6>
                                        <h6 class="card-subtitle mb-2 text-muted ">Point: {{ $parent_details->point }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endisset
                </div>
                <div class="card-body">
                    <div class="badge badge-secondary pt-1 pb-1">
                        <h5>Level 1</h5>
                    </div>
                    @isset($child_details)
                        <div class="row justify-content-between pt-1 pb-1">


                            @forelse ($child_details as $child_details)
                                <div class="col-md-2 col-xl-2 col-sm-12">



                                    <div class="card">
                                        <img src="{{ asset('images/users/' . $child_details->picture) }}"
                                            class="card-img-top rounded-circle" height="100px" width="100px"
                                            alt="{{ $child_details->name }}">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $child_details->name }}</h5>
                                            <h6 class="card-subtitle mb-2 text-muted ">{{ $child_details->uuid }}</h6>
                                            <h6 class="card-subtitle mb-2 text-muted ">Point: {{ $child_details->point }}</h6>
                                        </div>
                                    </div>
                                </div>
                            @empty

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">No Child</h5>
                                        <h6 class="card-subtitle mb-2 text-muted ">No Child</h6>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    @endisset



                </div>
            </div>
        </div>
    </div>
</x-backend.layouts.master>
