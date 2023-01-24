<?php
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
?>
<x-backend.layouts.master>
      <?php
    $notification = \App\Models\Notification::where('user_id', auth::id())
        ->where('status', 'unread')
        ->where(function ($query) {
            $query->where('type', 'sponsor')->orWhere('type', 'payment');
        })
        ->paginate();
    
    $todayPoints = \App\Models\PaymentHistory::where('payment_id', 4)
        ->whereDate('created_at', Carbon::today())
        ->sum('point');
    $adminReword = \App\Models\PaymentHistory::where('payment_id', 3)
        ->whereDate('created_at', Carbon::today())
        ->sum('point');
    $totalEarning = \App\Models\PaymentHistory::where('payment_id', 2)
        ->whereDate('created_at', Carbon::today())
        ->sum('point');
    
    ?>
    <div class="m-5">
        <h3>Welcome,
            {{ Auth::user()->name }}
        </h3>
            <div class="row">
            <div class="col-md-12 alert alert-success" role="alert">
                Today total earning <p class="btn btn-outline-primary col-1">{{ $todayPoints }}</p>
                Admin Reword <p class="btn btn-outline-primary col-1">{{ $adminReword }}</p>
                Total Earning <p class="btn btn-outline-primary col-1">{{ $totalEarning }}</p>
                Widrow <p class="btn btn-outline-primary col-1">{{ $todayPoints * 0.9 }}</p>
            </div>
        </div>
    </div>
    @if (session('message'))
        <div class="alert alert-success">
            <span class="close" data-dismiss="alert">&times;</span>
            <strong>{{ session('message') }}.</strong>
        </div>
    @endif

  

    {{-- notification --}}
    <div class="container">
    
        <div class="row">

            <div class="col-md-12">
                @foreach ($notification as $item)
                    <div class="alert alert-success" role="alert">
                        <p>{{ $item->message }}</p>
                        <hr>
                        <a href="{{ route('approvePage', ['notification' => $item]) }}" type="button"
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
