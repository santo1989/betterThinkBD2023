<x-frontend.layouts.master>
    <div class="container">
        @if (is_null($product) || empty($product))
            <div class="row" id="empty">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <h1 class="text-danger text-center"> <strong>Currently No Information Available!</strong> </h1>
                </div>
            </div>
    </div>
@else
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-sm-12 col-xl-12 mb-5" id="card_event">
                <div class="row justify-content-between">
                    <div class="row">
                        <div class="col-md-4 col-sm-12 pt-2 pb-2 px-1 py-1">

                            {{-- card for Address of Division --}}
                            <div class="card h-100 pt-2 pb-2 px-1 py-1" style=" background-color:rgba(0,119,191,255);">
                                <div class="card-body">
                                    <h5 class="card-title text-center text-white">Card title</h5>

                                </div>
                            </div>

                        </div>

                        <div class="col-md-4 col-sm-12 pt-2 pb-2 px-1 py-1">
                            {{-- card for Address of Company Name --}}
                            <div class="card h-100 pt-2 pb-2 px-1 py-1" style=" background-color:rgba(0,119,191,255);">
                                <div class="card-body">
                                    <h5 class="card-title text-center text-white">Card title</h5>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12 pt-2 pb-2 px-1 py-1">

                            {{-- card for Address of Company Location --}}
                            <div class="card h-100 pt-2 pb-2 px-1 py-1" style=" background-color:rgba(0,119,191,255);">
                                <div class="card-body">
                                    <h5 class="card-title text-center text-white">Card title</h5>

                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-12 pt-2 pb-2 px-1 py-1">
                            {{-- image top card with details --}}
                            <div class="card h-100 pt-2 pb-2 px-1 py-1" style=" background-color:rgba(0,119,191,255);">
                                <!-- product image-->
                                <img class="card-img-top" src="{{ asset('images/products/' . $product->image) }}"
                                    height="180" alt="..." />
                                <div class="card-body">
                                    <h5 class="card-title text-center text-white">{{ $product->title }}</h5>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12 pt-2 pb-2 px-1 py-1">
                            {{-- card for description --}}
                            <div class="card h-100 pt-2 pb-2 px-1 py-1" style=" background-color:rgba(0,119,191,255);">
                                <div class="card-body">
                                    <h5 class="card-title text-center text-white">{{ $product->description }}</h5>

                                </div>
                            </div>

                        </div>

                        <div class="col-md-4 col-sm-12 pt-2 pb-2 px-1 py-1">
                            {{-- card for discount items --}}
                            <div class="card h-100 pt-2 pb-2 px-1 py-1" style=" background-color:rgba(0,119,191,255);">
                                <div class="card-body">
                                    <h5 class="card-title text-center text-white">Discount {{ $product->discount_amount }} %</h5>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            {{-- card for point --}}
                            <div class="card h-100 pt-2 pb-2 px-1 py-1" style=" background-color:rgba(0,119,191,255);">
                                <div class="card-body">
                                    <h5 class="card-title text-center text-white">For Buy {{ $product->point_needed }} Point Need
                                    </h5>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @endif

</x-frontend.layouts.master>
