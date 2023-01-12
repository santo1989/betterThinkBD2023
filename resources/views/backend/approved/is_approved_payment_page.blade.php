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
               @if($payment_details->is_approved_payment == 0)
               @isset($payment)
                       <div class="alert alert-success" role="alert">
                           <h4 class="alert-heading">Conform Approve Request</h4>
                           <p>Are you sure you want to approve this request?</p>
                           <p>
                                 {{-- <b>Payment Details:</b>
                                 <br>
                                 <b>Payment ID:</b> {{ $payment->payment_id }}
                                 <br>
                                 <b>Payment Type:</b> {{ $payment->payment_type }}
                                 <br>
                                 <b>Payment Amount:</b> {{ $payment->payment_amount }}
                                 <br>
                                 <b>Payment Date:</b> {{ $payment->payment_date }}
                                 <br>
                                 <b>Payment Status:</b> {{ $payment->payment_status }}
                                 <br>
                                 <b>Payment Details:</b> {{ $payment->payment_details }}
                                 <br>
                                 <b>Payment Image:</b> {{ $payment->payment_image }}
                                 <br>
                                 <b>Payment User ID:</b> {{ $payment->user_id }}
                                 <br>
                                 <b>Payment Sponsor ID:</b> {{ $payment->sponsor_id }}
                                 <br>
                                 <b>Payment Product ID:</b> {{ $payment->product_id }}
                                 <br>
                                 <b>Payment Point:</b> {{ $payment->point }}
                                 <br> --}}

                            {{-- 'user_id' => Auth::user()->uuid,
                'details' => $request->details,
                'payment_id'=> Auth::user()->uuid,
                'sponsor_id' => $request->sponsor_id,
                'product_id' => $request->product_id,
                'point' => $request->point,</p> --}}
                           <hr>
                           
                       </div>
                   
               @endisset
            </div>
        </div>
    </div>
    {{-- end notification --}}
</x-backend.layouts.master>
