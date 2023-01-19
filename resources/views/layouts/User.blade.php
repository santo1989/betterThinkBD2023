<x-backend.layouts.master>
    <div class="m-5">
        <h3>Welcome,
            {{ Auth::user()->name }}
        </h3>
    </div>
    @if (session('message'))
        <div class="alert alert-success">
            <span class="close" data-dismiss="alert">&times;</span>
            <strong>{{ session('message') }}.</strong>
        </div>
    @endif

    <?php
    $notification = App\Models\Notification::where('status', 'unread')->where(function ($query){
        $query->where('type','sponsor')->orWhere('type', 'payment');
    })->paginate();
    ?>

    {{-- notification --}}
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @foreach ($notification as $item)
                    <div class="alert alert-success" role="alert">
                        <p>{{ $item->message }}</p>
                        <hr>
                        <a href="{{ route('approvePage',['notification' => $item]) }}" type="button"
                           class="btn btn-success">Approved Request</a>
                        <a type="button" class="btn btn-danger">Decline Request</a>
                    </div>
                @endforeach
            </div>
        </div>
        {{ $notification->links() }}
    </div>
    {{-- end notification --}}

</x-backend.layouts.master>
