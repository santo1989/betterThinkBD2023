<x-frontend.layouts.master>
    @php
        $categories = App\Models\Category::all();
        // $utilityDynamics =  App\Models\UtilityDynamic::where('')
        $products = App\Models\Product::all();
        $galary_utilities = App\Models\UtilityDynamic::where('type_of_placement', 2)->get();
        $logos = App\Models\UtilityDynamic::where('type_of_placement', 1)->get();
    @endphp
    {{-- <div class="top_gallary_container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @forelse($galary_utilities as $key => $product)
                    <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}"
                        class="{{ $key == 0 ? 'active' : '' }}"></li>
                @empty
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                @endforelse
            </ol>
            <div class="carousel-inner">
                @forelse($galary_utilities as $key => $product)
                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                        <div class="img-glary">
                            <img src="{{ asset('images/utilityDynamic/' . $product->picture) }}" class="d-block w-100"
                                alt="{{ $product->name }}" height="300px">
                        </div>
                        <div class="carousel-caption">
                            <h3>{{ $product->name }}</h3>
                            <p>{{ $product->description }}</p>
                        </div>
                    </div>
                @empty
                    <div class="carousel-item active">
                        <div class="img-glary">
                            <div class="col-md-12">
                                <div class="alert alert-danger">
                                    No Image found for show
                                </div>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>

        </div>
    </div> --}}

    <hr class="hr1 bg-info p-1 mt-2 mb-2">


    <div class="container">

        <div class="row justify-content-between">
            @forelse ($categories as $category)
                <div class="col-xl-4 col-md-4 col-sm-12  pt-2 pb-1">
                    <div class="card" style="width: 18rem;">
                        <div class="card-image" style=" background-color:rgba(0,119,191,255);">
                            <img src="{{ asset('images/categories/' . $category->image) }}"
                                class="card-img-top pt-5 pb-5" height="300px" alt="...">
                        </div>

                        <div class="card-body text-center" style=" height:100px;">
                            <a href="{{ route('category_details', ['id' => $category->id]) }}" class="btn text-center">
                                <h5 class="card-title text-center">{{ Str::words($category->title, '10') }}</h5>
                            </a>
                        </div>
                    </div>
                </div>

            @empty
                <div class="col-md-12">
                    <div class="alert alert-danger">
                        No Category Found
                    </div>
                </div>
            @endforelse
        </div>
    </div>
    <hr class="h2 bg-info mt-1 mb-1">

    {{-- logo show start  --}}

    <!-- Carousel wrapper -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        {{-- <ol class="carousel-indicators">
            @foreach ($products as $key => $product)
                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}"
                    class="{{ $key == 0 ? 'active' : '' }}"></li>
            @endforeach
        </ol> --}}
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="row">
                    @forelse ($logos as $key => $product)
                        <div class="col-md-2">
                            <div class="card">
                                <img src="{{ asset('images/utilityDynamic/' . $product->picture) }}"
                                    class="card-img-top img-thumbnail" alt="{{ $product->name }}">
                                {{-- <div class="card-body">
                                    <h5 class="card-title">{{ $product->title }}</h5>
                                    <p class="card-text">{{ $product->description1 }}</p>
                                </div> --}}
                            </div>
                        </div>
                        @if (($loop->index + 1) % 6 == 0 || $loop->last)
                </div>
            </div>
            @if (!$loop->last)
                <div class="carousel-item">
                    <div class="row">
            @endif
            @endif
        @empty
            <div class="col-md-12">
                <div class="alert alert-danger">
                    No Logo for show
                </div>
            </div>

            @endforelse
        </div>
    </div>
    </div>
    {{-- <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a> --}}
    </div>

    <!-- Carousel wrapper -->

    {{-- logo show end  --}}





    @push('css')
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Open+Sans">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <style>
            h2 {
                color: #000;
                font-size: 26px;
                font-weight: 300;
                text-align: center;
                text-transform: uppercase;
                position: relative;
                margin: 30px 0 60px;
            }

            h2::after {
                content: "";
                width: 100px;
                position: absolute;
                margin: 0 auto;
                height: 4px;
                border-radius: 1px;
                background: #7ac400;
                left: 0;
                right: 0;
                bottom: -20px;
            }

            .card-image {
                height: 200px;
            }

            .card-image img {
                height: 100%;
                width: 100%;
            }

            .card-body {
                height: 100px;
            }

            .card-body a {
                height: 100%;
            }

            .card-body a:hover {
                text-decoration: none;
            }

            .card-body a h5 {
                height: 100%;
            }

            .card-body a h5:hover {
                text-decoration: none;
            }

            /* slider for logo  */

            /* Add some custom styling to the slider */
            .carousel-indicators li {
                background-color: #d8d8d8;
            }

            .carousel-indicators .active {
                background-color: #007bff;
            }

            /* Card styling */
            .card {
                border: none;
            }

            /* .card-img-top {
                  width: 100%;
                  height: 200px;
                  object-fit: cover;
                } */
            @media (min-width: 576px) {

                /* Show 4 products per row on screens larger than 576px */
                .carousel-item .col-md-2 {
                    width: 25%;
                }


            }

            @media (min-width: 768px) {

                /* Show 6 products per row on screens larger than 768px */
                .carousel-item .col-md-2 {
                    width: 16.66%;
                }
            }

            @media (min-width: 992px) {

                /* Show 8 products per row on screens larger than 992px */
                .carousel-item .col-md-2 {
                    width: 12.5%;
                }
            }

            @media (min-width: 1200px) {

                /* Show 10 products per row on screens larger than 1200px */
                .carousel-item .col-md-2 {
                    width: 10%;
                }
            }
        </style>
    @endpush

    @push('js')
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script>
            // MDB Lightbox Init
            $(function() {
                $("#mdb-lightbox-ui").load("mdb-addons/mdb-lightbox-ui.html");
            });

            $(document).ready(function() {
                $('.carousel').carousel({
                    interval: 3000
                })
            });
        </script>
    @endpush
</x-frontend.layouts.master>
