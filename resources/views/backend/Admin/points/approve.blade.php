<x-backend.layouts.master>
    <div class="m-5">
        <h3>
            {{ Auth::user()->name }}
        </h3>
    </div>
    {{-- notification --}}
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Conform Approve Request</h4>
                    <p>Are you sure you want to approve this request?</p>
                    <hr>
                    <form action="{{ route('approve.withdraw', ['notification' => $notification]) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-success">Conform</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- end notification --}}
</x-backend.layouts.master>
