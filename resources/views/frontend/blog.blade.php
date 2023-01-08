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
    <div class="container">
        <div class="row justify-content-center">
        @forelse ($blogs as $blog)
            
                <div class="col-md-4 col-sm-12 pt-2 pb-1">
                    <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="{{ asset('images/blogs/' . $blog->image) }}"
                                    height="180" alt="..." />

                        <div class="card-body">
                             <a class="btn text-center" href=" {{ route('blog_details', $blog->id)}} ">{{ Str::words($blog->title, '10') }}</a>
                                <p class="card-text"><small class="text-muted">Posted
                                    {{ $blog->created_at->diffForHumans() }}</small></p>
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
    </div>
    @endif

</x-frontend.layouts.master>
