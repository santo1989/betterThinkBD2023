<x-backend.layouts.master>
    <div class="m-5">
        <h3>Welcome,
            @php
                echo auth()->user()->name;
            @endphp !
        </h3>
    </div>
    {{-- notification --}}
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @php
                    $payment = DB::table('notifications')
                        ->where('name', auth()->user()->uuid)
                        ->where('status', 'unread')
                        ->get();
                    //    dd($payment)
                @endphp

                @isset($payment)
                    @foreach ($payment as $item)
                        <div class="alert alert-success" role="alert">
                            <h4 class="alert-heading">{{ $item->user_id }}</h4>
                            <p>{{ $item->message }}</p>
                            <hr>
                            <a type="button" class="btn btn-success"
                                @php
$payment_id = DB::table('users')->where('payment_id', $item->name)->first();
                                 $sponsor_id = DB::table('users')->where('sponsor_id', $item->name)->first(); @endphp
                                @if (isset($sponsor_id)) href="{{ route('is_approved_sponsor_page') }}"
                            @elseif(isset($payment_id))
                                    href="{{ route('is_approved_payment_page') }}"
                            @elseif(isset($sponsor_id) && isset($payment_id))
                                    href="{{ route('is_approved_sponsor_payment_page') }}" @endif>Approved
                                Request</a>
                            <a type="button" class="btn btn-danger" href="{{ route('is_rejected') }}">Decline Request</a>
                        </div>
                    @endforeach

                @endisset
            </div>
        </div>
    </div>
    {{-- end notification --}}
</x-backend.layouts.master>
