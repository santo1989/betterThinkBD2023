<x-frontend.layouts.master>
    <div class="container">
        @if (is_null($blogs) || empty($blogs))
            <div class="row" id="empty">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <h1 class="text-danger text-center"> <strong>Currently No Information Available!</strong> </h1>
                </div>
            </div>
    </div>
@else
    <div class="container" style="height: 100vh;">
        @forelse ($blogs as $blog)
            <div class="row justify-content-center">
                <div class="col-md-12 col-sm-12 pt-2 pb-1">
                    <div class="card">
                        <div class="row justify-content-center">
                            <div class="col-md-6 col-sm-12">
                                <img class="card-img-top" src="{{ asset('images/blogs/' . $blog->image) }}"
                                    height="180" alt="..." />
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <h5 class="card-title pt-5">{{ $blog->title }}</h5>
                                <p class="card-subtitle mb-2 text-muted">By {{ $blog->author }}</p>
                            </div>
                        </div>

                        <div class="card-body">
                            <p class="card-text">{{ $blog->post }}</p>
                            {{-- post time difference --}}
                            <p class="card-text"><small class="text-muted">Posted
                                    {{ $blog->created_at->diffForHumans() }}</small></p>
                        </div>
                    </div>
                </div>
            </div>
        @empty

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">No Blog Post Available</h5>
                </div>
            </div>
        @endforelse

    </div>
    @endif

</x-frontend.layouts.master>
