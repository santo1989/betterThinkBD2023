@props(['product'])

<div class="col mb-5">
    <div class="card h-100">
        <!-- product image-->
        <img class="card-img-top" src="{{ asset('images/products/'.$product->images) }}" height="180" alt="..." />
        <!-- product details-->
        <div class="card-body p-4">
            <div class="text-center">
                <!-- product name-->
                <h5 class="fw-bolder">
                    <a href="{{ route('fleet_details', ['id'=>$product->id]) }}">{{ $product->title }}</a>
                </h5>
                <!-- product reviews-->
                <div class="d-flex justify-content-center small text-warning mb-2">
                        {{ $product->description, 10 }}
                </div>
                <!-- product price-->
            </div>
        </div>
    </div>
</div>