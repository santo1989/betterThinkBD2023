<x-frontend.layouts.master>
        @php
            $categories = App\Models\Category::all();
        @endphp
    <div class="container">
       
        <div class="row justify-content-between">
            @forelse ($categories as $category)
                <div class="col-md-3 px-1 py-1 mt-1 ml-1">
                    <div class="card" style="width: 18rem;">
                        <div class="card-image" style=" background-color:rgba(0,119,191,255);">
                            <img src="{{ asset('images/categories/' . $category->image) }}" class="card-img-top pt-5 pb-5"
                                alt="...">
                        </div>

                        <div class="card-body text-center">
                            <a href="{{ route('category_details', ['id' => $category->id]) }}" class="btn text-center">
                                <h5 class="card-title text-center">{{ $category->title }}</h5>
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
</x-frontend.layouts.master>
