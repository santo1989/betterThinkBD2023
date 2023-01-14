8<x-frontend.layouts.master>
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
                        <div class="short_address col-md-4 col-sm-12 pt-2 pb-2 px-1 py-1">

                            {{-- card for Address of Division --}}
                            <div class="card h-100 pt-2 pb-2 px-1 py-1" style=" background-color:rgba(0,119,191,255);">
                                <div class="card-body">
                                    <h5 class="card-text text-center text-white">{{ $product->short_address }}</h5>

                                </div>
                            </div>

                        </div>

                        <div class="Company_title col-md-4 col-sm-12 pt-2 pb-2 px-1 py-1">
                            {{-- card for Address of Company Name --}}
                            <div class="card h-100 pt-2 pb-2 px-1 py-1" style=" background-color:rgba(0,119,191,255);">
                                <div class="card-body">
                                    <h5 class="card-title text-center text-white">{{ $product->title }}</h5>

                                </div>
                            </div>
                        </div>

                        <div class="long_address col-md-4 col-sm-12 pt-2 pb-2 px-1 py-1">

                            {{-- card for Address of Company Location --}}
                            <div class="card h-100 pt-2 pb-2 px-1 py-1" style=" background-color:rgba(0,119,191,255);">
                                <div class="card-body">
                                    <h5 class="card-text text-center text-white">{{ $product->long_address }}</h5>

                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="row">
                        <div class="company_info col-md-4 col-sm-12 pt-2 pb-2 px-1 py-1">
                            {{-- image top card with details --}}
                            <div class="card h-100 pt-2 pb-2 px-1 py-1" style=" background-color:rgba(0,119,191,255);">
                                <!-- company logo-->
                                <div class="company_logo">
                                    <img class="card-img-top"
                                        src="https://img.favpng.com/21/3/25/logo-symbol-graphic-design-png-favpng-sphXDsdhAQSvnRLYPLzdASPRK_t.jpg"
                                        height="100" alt="..." />
                                    {{-- <img class="card-img-top" src="{{ asset('images/products/' . $product->logo) }}"
                                        height="100" alt="..." /> --}}
                                </div>
                                <!-- product image-->
                                <div class="company_image-round">
                                    <img class="card-img-top"
                                        src="https://png.pngtree.com/png-clipart/20210906/ourmid/pngtree-business-office-building-construction-png-image_3865022.jpg"
                                        height="200" alt="..." />
                                    {{-- <img class="card-img-top" src="{{ asset('images/products/' . $product->image) }}"
                                        height="200" alt="..." /> --}}
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title text-center text-white">{{ $product->title }}</h5>
                                    <p class="card-text text-center text-white">{{ $product->short_address }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="description1 col-md-4 col-sm-12 pt-2 pb-2 px-1 py-1">
                            {{-- card for description --}}
                            <div class="card h-100 pt-2 pb-2 px-1 py-1" style=" background-color:rgba(0,119,191,255);">
                                <div class="card-body">
                                    <h5 class="card-text text-center text-white">{{ $product->description1 }}</h5>

                                </div>
                            </div>

                        </div>

                        <div class="description2 col-md-4 col-sm-12 pt-2 pb-2 px-1 py-1">
                            {{-- card for discount items --}}
                            <div class="card h-100 pt-2 pb-2 px-1 py-1" style=" background-color:rgba(0,119,191,255);">
                                <div class="card-body">
                                    <p class="card-text text-center text-white">{{ $product->description2 }}
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="buy_card col-md-12 col-sm-12 pt-2 pb-2 px-1 py-1">
                            <div class="card mb-4 rounded-3 shadow-sm text-center text-white" style=" background-color:rgba(0,119,191,255);">
                                <div class="card-header py-3">
                                    <h4 class="my-0 fw-normal">Discount {{ $product->discount_amount }} %</h4>
                                </div>
                                <div class="card-body">
                                    <h1 class="card-title pricing-card-title">{{ $product->point_needed }}  <small
                                            class=" fw-light"> Point</small></h1>

                                    <a class="btn btn-primary btn-lg btn-block "
                                         type="button">
                                        Buy now
                                    </a>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="col-md-12"> --}}
                        {{--  card for point --}}
                        {{-- <div class="card h-100 pt-2 pb-2 px-1 py-1" style=" background-color:rgba(0,119,191,255);">
                                <div class="card-body">
                                    <h5 class="card-title text-center text-white">For Buy {{ $product->point_needed }} Point Need
                                    </h5>

                                </div>
                            </div> 


                        </div> --}}
                    </div>

                </div>
            </div>
        </div>
    </div>
    @endif
    @push('css')
        <style>
            .company_logo {
                text-align: center;
                padding: 10px;
                background-color: transparent;
            }

            .company_logo img {
                width: 100px;
                height: 100px;
                border-radius: 50%;
            }

            .company_image-round {
                text-align: center;
                padding: 10px;
            }

            .company_image-round img {
                width: 200px;
                height: 200px;
                background-color: transparent;
            }

            /* mobile view */
            @media (max-width: 768px) {
                .short_address {
                    display: none !important;
                }

                .long_address {
                    display: none !important;
                }

                .description1 {
                    display: none !important;
                }
            }
        </style>
    @endpush
</x-frontend.layouts.master>
