<?php
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
?>
<x-backend.layouts.master>

    <?php
    $notification = \App\Models\Notification::where('user_id', auth::id())
        ->where('status', 'unread')
        ->where(function ($query) {
            $query->Where('type', 'payment');
        })
        ->paginate();

    $todayPoints = \App\Models\PaymentHistory::where('user_id', Auth::id())
        ->where('type', 'sponsor')
        ->whereDate('created_at', Carbon::today())
        ->sum('point');
    $adminReward = \App\Models\PaymentHistory::where('user_id', Auth::id())
        ->where('type', \App\Enums\PaymentType::REWARD())
        ->sum('point');
    $withdraw = \App\Models\PaymentHistory::where('user_id', Auth::id())
        ->where('type', \App\Enums\PaymentType::WITHDRAW())
        ->sum('point');
    $clientReward = \App\Models\PaymentHistory::where('user_id', Auth::id())
        ->where('type', \App\Enums\PaymentType::SPONSOR())
        ->sum('point');

    ?>

    <x-slot name='breadCrumb'>
        <br />
        <div class="text-end">
            <h4> Current Point : {{ auth()->user()->point ?? '0' }}
        <br />
        Admin Reward : {{ $adminReward ?? '0' }} <br />
        Client Reward : {{ $clientReward ?? '0' }} <br />
        Withdraw Point : {{ $withdraw ?? '0' }} <br />
        Today Client Point : {{ $todayPoints ?? '0'}}</h4>
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
