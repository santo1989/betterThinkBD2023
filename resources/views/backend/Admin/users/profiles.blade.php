<x-backend.layouts.master>

    {{-- Profile of {{ Auth::user()->name }} --}}



    <div class="container">
        <div class="main-body">
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="{{ asset('images/users/' . Auth::user()->picture) }}" class="rounded-circle"
                                    width="150" alt="{{ Auth::user()->name }}">
                                <div class="mt-3">
                                    <h4>{{ Auth::user()->name ?? '' }}</h4>
                                    <p class="text-muted font-size-sm">{{ Auth::user()->email }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">Sponser</h6>
                                <span class="text-secondary">{{ Auth::user()->sponser_id ?? '' }}</span>
                            </li>

                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">Point</h6>
                                <span class="text-secondary">{{ Auth::user()->point ?? '' }}</span>

                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Bkash</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ Auth::user()->bkash_no ?? '' }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Bank Information</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                   Account No: {{ Auth::user()->account_no ?? '' }},<br /> Bank Name: {{ Auth::user()->bank_name ?? '' }},<br /> Branch:
                                    {{ Auth::user()->branch ?? '' }}
                                </div>
                            </div>
                            <hr>
                            @php
                                $sponser = App\Models\User::where('uuid', Auth::user()->sponsor_id)->first();
                                // dd($sponser)
                            @endphp
                            
                                <div class="row">
                                    <div class="col-sm-3">
                                        
                                        <h6 class="mb-0">Sponsor Information</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">

                                        {{ $sponser->name ?? '' }}, {{ $sponser->mobile ?? '' }}
                                    </div>
                                </div>
                                <hr>
                            
                            @php
                                $payment = App\Models\User::where('id', Auth::user()->payment_id)->first();
                            @endphp
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Payment Information</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">


                                        {{ $payment->name ?? '' }}, {{ $payment->mobile ?? '' }}


                                    </div>
                                </div>

                                <hr>

                           <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Mobile</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">{{ Auth::user()->mobile }}</div>
                                </div>

                                <hr>
                                 <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">National ID</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">{{ Auth::user()->nid }}</div>
                                </div>

                                <hr>
                        </div>
                    </div>



                </div>
            </div>

        </div>
    </div>

    <style>
        body {
            margin-top: 0px;
            color: #1a202c;
            text-align: left;
            background-color: #e2e8f0;
        }

        .main-body {
            padding: 15px;
        }

        .card {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0, 0, 0, .125);
            border-radius: .25rem;
        }

        .card-body {
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1rem;
        }

        .gutters-sm {
            margin-right: -8px;
            margin-left: -8px;
        }

        .gutters-sm>.col,
        .gutters-sm>[class*=col-] {
            padding-right: 8px;
            padding-left: 8px;
        }

        .mb-3,
        .my-3 {
            margin-bottom: 1rem !important;
        }

        .bg-gray-300 {
            background-color: #e2e8f0;
        }

        .h-100 {
            height: 100% !important;
        }

        .shadow-none {
            box-shadow: none !important;
        }
    </style>

</x-backend.layouts.master>