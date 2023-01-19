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
    <section>
        {{-- <div class="row">
        <h2 class="section-heading">Services Details</h2>
        </div> --}}
        <div class="row">
            <div class="column">
                <div class="card">
                    {{-- <div class="icon-wrapper">
                        <i class="fas fa-hammer"></i>
                    </div> --}}
                    <h3 class="h3-heading">{{ $product->short_address }}</h3>
                    {{-- <p>
                        {{ $product->short_address }}
                    </p> --}}
                </div>
            </div>
            <div class="column">
                <div class="card">
                    {{-- <div class="icon-wrapper">
                        <i class="fas fa-brush"></i>
                    </div> --}}
                    <h3 class="h3-heading">{{ $product->title }}</h3>
                    {{-- <p>
                      {{ $product->title }}
                    </p> --}}
                </div>
            </div>
            <div class="column">
                <div class="card">
                    {{-- <div class="icon-wrapper">
                        <i class="fas fa-wrench"></i>
                    </div> --}}
                    <h3 class="h3-heading">{{ $product->long_address }}</h3>
                    {{-- <p>
                        {{ $product->long_address }} 
                    </p> --}}
                </div>
            </div>
            <div class="column">
                <div class="card">
                    {{-- <div class="icon-wrapper">
                    </div> --}}
                    <!-- company logo-->
                    <div class="company_logo">
                       {{--  <img class="card-img-top"
                            src="https://img.favpng.com/21/3/25/logo-symbol-graphic-design-png-favpng-sphXDsdhAQSvnRLYPLzdASPRK_t.jpg"
                            height="100" alt="..." /> --}}
                        <img class="card-img-top" src="{{ asset('images/products/' . $product->logo) }}"
                                        height="100" alt="..." />
                    </div>
                    <!-- product image-->
                    <div class="company_image-round">
                       {{--   <img class="card-img-top"
                            src="https://png.pngtree.com/png-clipart/20210906/ourmid/pngtree-business-office-building-construction-png-image_3865022.jpg"
                            height="200" alt="..." />--}}
                       <img class="card-img-top" src="{{ asset('images/products/' . $product->image) }}"
                                        height="200" alt="..." /> 
                    </div>
                    <h3>{{ $product->title }}</h3>
                    <p>
                        {{ $product->short_address }}
                    </p>
                </div>
            </div>
            <div class="column">
                <div class="card">
                    <h5 class="h3-heading text-center"> Discount {{ $product->discount_amount }} %</h5>
                    {{-- <div class="icon-wrapper"> --}}
                        {{-- <h4 class="my-0 fw-normal"> </h4> --}}
                    {{-- </div> --}}
                    <p>
                       {{ $product->description1 }}
                    </p>
                </div>
            </div>
            <div class="column">
                <div class="card">
                    {{-- <a class="btn btn-outline-warning" type="button">
                       {{ $product->point_needed }} Point <br> Buy Now
                    </a> --}}
                    <p>
                       {{ $product->description2 }}
                    </p>
                </div>
            </div>
        </div>

    </section>
    @endif
    @push('css')
        <style>
            * {
                padding: 0;
                margin: 0;
                box-sizing: border-box;
                font-family: "Poppins", sans-serif;
            }

            section {
                height: 100vh;
                width: 100%;
                display: grid;
                place-items: center;
            }

            .row {
                display: flex;
                flex-wrap: wrap;
            }

            .column {
                width: 100%;
                padding: 0 1em 1em 1em;
                text-align: center;
            }

            .card {
                width: 100%;
                height: 100%;
                padding: 2em 1.5em;
                background: linear-gradient(#ffffff 50%, #2c7bfe 50%);
                background-size: 100% 200%;
                background-position: 0 2.5%;
                border-radius: 5px;
                box-shadow: 0 0 35px rgba(0, 0, 0, 0.12);
                cursor: pointer;
                transition: 0.5s;
            }

            h3 {
                font-size: 20px;
                font-weight: 600;
                color: #1f194c;
                margin: 1em 0;
            }

            .h3-heading {
                font-size: 20px;
                font-weight: 600;
                color: #1f194c;
                margin: 1em 0;
            }

            p {
                color: #575a7b;
                font-size: 15px;
                line-height: 1.6;
                letter-spacing: 0.03em;
            }

            .icon-wrapper {
                background-color: #2c7bfe;
                position: relative;
                margin: auto;
                font-size: 30px;
                height: 2.5em;
                width: 2.5em;
                color: #ffffff;
                border-radius: 50%;
                display: grid;
                place-items: center;
                transition: 0.5s;
            }

            .card:hover {
                background-position: 0 100%;
            }

            .card:hover .icon-wrapper {
                background-color: #ffffff;
                color: #2c7bfe;
            }

            .card:hover h3 {
                color: #ffffff;
            }

            .card:hover .h3-heading {
                color: #ffffff;
            }

            .card:hover p {
                color: #f0f0f0;
            }

            @media screen and (min-width: 768px) {
                section {
                    padding: 0 2em;
                }

                .column {
                    flex: 0 50%;
                    max-width: 50%;
                }
            }

            @media screen and (min-width: 992px) {
                section {
                    padding: 1em 3em;
                }

                .column {
                    flex: 0 0 33.33%;
                    max-width: 33.33%;
                }
            }

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
