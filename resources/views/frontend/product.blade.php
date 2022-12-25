<x-frontend.layouts.master>
    <div class="container">
        @if (is_null($products) || empty($products))
            <div class="row" id="empty">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <h1 class="text-danger text-center"> <strong>Currently No Information Available!</strong> </h1>
                </div>
            </div>
        @else
            <div>
                {{-- @dd($products) --}}
                <div class="mb-5">
                    <form action="#">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control " aria-describedby="button-addon2" name='search'
                                placeholder="Search" />
                        </div>
                    </form>
                </div>
            </div>
            <div class="row justify-content-center">
                @forelse ($products as $product)
                    {{-- <x-frontend.product-card :product="$product" /> --}}
                    <div class="col-md-3 col-sm-12 col-xl-3 mb-5" id="card_event">
                        <div class="card h-100">
                            <!-- product image-->
                            <img class="card-img-top" src="{{ asset('images/products/' . $product->image) }}"
                                height="180" alt="..." />
                            <!-- product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- product name-->
                                    <h5 class="fw-bolder">
                                        <a
                                            href="{{ route('product_details', ['id' => $product->id]) }}">{{ $product->title }}</a>
                                    </h5>
                                    <!-- product reviews-->
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        {{-- short description from long description of the product will be here --}}

                                        <div class="text-muted">
                                            {{ Str::limit($product->discription, 100) }}
                                        </div>
                                    </div>
                                    <!-- product price-->
                                </div>
                            </div>
                            <!-- product footer-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                    <a class="btn btn-outline-warning mt-auto"
                                        href="{{ route('product_details', ['id' => $product->id]) }}">View Details</a>
                                </div>
                            </div>

                        </div>
                    </div>
                @empty
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <h1 class="text-danger text-center"> <strong>Currently No Information Available!</strong> </h1>
                    </div>
                @endforelse
            </div>
    </div>
    <script>
        let search = document.querySelector('input[name="search"]');
        let card_event = document.querySelectorAll('#card_event');
        search.addEventListener('keyup', function() {
            let value = search.value.toLowerCase();
            card_event.forEach(function(card) {
                let card_name = card.querySelector('h5').textContent.toLowerCase();
                if (card_name.indexOf(value) != -1) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    </script>
    @endif

</x-frontend.layouts.master>
