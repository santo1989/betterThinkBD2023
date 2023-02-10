<?php
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
?>
<x-backend.layouts.master>
     <?php

    $todayPoints = \App\Models\PaymentHistory::where('payment_id', 4)
        ->whereDate('created_at', Carbon::today())
        ->sum('point');
    $adminReword = \App\Models\PaymentHistory::where('payment_id', 3)
        ->whereDate('created_at', Carbon::today())
        ->sum('point');
    $totalEarning = \App\Models\PaymentHistory::where('payment_id', 2)
        ->where('type', 'sponsor')
        ->whereDate('created_at', Carbon::today())
        ->sum('point');

    ?>
    <x-slot name="pageTitle">
        Admin Dashboard
    </x-slot>

      <x-slot name='breadCrumb'>
        <br />
        <div class="text-end">
            <h4> Current Point : {{ auth()->user()->point ?? '0' }}
        <br />
        Admin Reward : {{ $adminReword ?? '0' }} <br />
        Client Reward : {{ ($todayPoints - $adminReword) ?? '0' }} <br />
        Withdraw Point : {{ $todayPoints ?? '0' }} <br />
        Today Point : {{ $todayPoints ?? '0'}}</h4>
        {{-- <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> Dashboard</x-slot>
            <li class="breadcrumb-item active">Dashboard</li>

        </x-backend.layouts.elements.breadcrumb> --}}
    </div>
    </x-slot>

    @if (session('message'))
        <div class="alert alert-success">
            <span class="close" data-dismiss="alert">&times;</span>
            <strong>{{ session('message') }}.</strong>
        </div>
    @endif

    <?php
    $notification = App\Models\Notification::where('user_id', auth::id())
        ->where('status', 'unread')
        ->where(function ($query) {
            $query->Where('type', 'payment');
        })
        ->paginate();
    ?>

    {{-- notification --}}
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @foreach ($notification as $item)
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading"></h4>
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
