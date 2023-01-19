<x-backend.layouts.master>
    <div class="m-5">
        <h3>
            {{ Auth::user()->name }}
        </h3>
    </div>
    {{-- notification --}}
    @if (session('errors'))
        <div class="alert alert-danger">
            <span class="close" data-dismiss="alert">&times;</span>
            <strong>{{ session('errors')->first() }}</strong>
        </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Conform Approve Request</h4>
                    <p>Are you sure you want to approve this request?</p>
                    <hr>
                    <form action="{{ route('approve', ['child_id' => $notification->child_id, 'type' => $notification->type, 'notification_id' => $notification->id]) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-success">Conform</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- end notification --}}
</x-backend.layouts.master>
