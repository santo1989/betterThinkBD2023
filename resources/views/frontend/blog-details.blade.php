<x-frontend.layouts.master>
    <div class="container">
        @if (is_null($blog) || empty($blog))
            <div class="row" id="empty">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <h1 class="text-danger text-center"> <strong>Currently No Information Available!</strong> </h1>
                </div>
            </div>
    </div>
@else
    {{-- <div class="container">
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
                            <!-- post time difference -->
                            <p class="card-text"><small class="text-muted">Posted
                                    {{ $blog->created_at->diffForHumans() }}</small></p>
                        </div>
                    </div>
                </div>
            </div>
    </div> --}}
    <!-- container starts -->
    <div class="container container-flex">
            <main role="main">
                
                <article class="article-featured">
                    <h2 class="article-title">{{ $blog->title }}</h2>
                    <img src="{{ asset('images/blogs/' . $blog->image) }}" alt="{{ $blog->title }}">
                    <p class="article-info" style="color:#f6f7f9">{{ $blog->created_at->diffForHumans() }}</p>
                    <p class="article-body" style="color:#f6f7f9">{{ $blog->post }}</p>
                </article>
                
                
            </main>
            
            <aside class="sidebar">
                
                <div class="sidebar-widget">
                    <h2 class="widget-title">Author</h2>
                   @php
                          $author = App\Models\Blog::where('author', $blog->author)->first();
                          $picture = App\Models\User::where('id', $blog->user_id)->first();
                   @endphp

                   @if($picture)
                    <img src="{{ asset('images/users/' . $picture->picture) }}" alt="{{ $blog->author }}" class="widget-image">
                     @else

                    <img src="https://raw.githubusercontent.com/kevin-powell/reponsive-web-design-bootcamp/master/Module%202-%20A%20simple%20life/img/about-me.jpg" alt="john doe" class="widget-image">
                    @endif
                    <p class="widget-body">{{ $blog->author }}</p>
                </div>
                
                <div class="sidebar-widget">
                    <h2 class="widget-title">RECENT POSTS</h2>
                    <div class="widget-recent-post">
                        @php
                            $recentPosts = App\Models\Blog::orderBy('id', 'desc')->take(3)->get();
                        @endphp
                        @forelse ($recentPosts as $recentPost)
                            <h3 class="widget-recent-post-title">{{ $recentPost->title }}</h3>
                            <img src="{{ asset('images/blogs/' . $recentPost->image) }}" alt="{{ $recentPost->title }}" class="widget-image">
                        @empty
                            <h3 class="widget-recent-post-title">No Recent Post Available</h3>
                            
                        @endforelse
                    </div>
                    
                </div>
                
            </aside>
            
        </div>
    <!-- container ends -->
    @endif
@push('css')

<style>

    /* Typography */
@import url('https://fonts.googleapis.com/css2?family=Lora&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Lora&family=Ubuntu:wght@300;400;700&display=swap');
body {
    margin: 0;
    font-family: 'Ubuntu', sans-serif;
    font-size: 1.125rem;
    font-weight: 300;
    background-color: transparent;
}
h1, 
h2,
h3 {
    font-family: 'Lora', serif;
    font-weight: 400;
    color: #f6f7f9;
    margin-top: 0;
}
h1{
  font-size: 2rem;
  margin: 0;
}
a {
    color: #f6f7f9;
}

a:hover,
a:focus {
    color: #f6f7f9;
}

strong {
    font-weight: 700;
}
.subtitle{
  font-size: 0.85rem;
  font-weight: 700;
  margin: 0;
  color: #f6f7f9;
  letter-spacing: 0.05em;
  font-family: 'Ubuntu Bold', sans-serif;
}
.article-title {
    font-size: 1.5rem;
}

.article-read-more,
.article-info {
    font-size: .875rem;
}

.article-read-more {
    color: #f6f7f9;
    text-decoration: none;
    font-weight: 700;
}
.article-read-more:hover,
.article-read-more:focus {
    color: #f6f7f9;
    text-decoration: underline;
}
.article-info {
    margin: 2em 0;
}
header{
  padding: 2em 0;
  text-align: center;
  background: #f0f8ff;
  font-family: sans-serif;
  margin-bottom: 3em;
}
.container-flex{
  max-width: 70vw;
  margin: 0 auto;
  display: flex;
  justify-content: space-between;
  margin-bottom: 1em;
}

img{
  max-width: 100%;
  display: block;
}
main{
  max-width: 75%;
}
.sidebar{
  max-width: 23%;
}
.article-body{
  width: 100%;
  text-align: justify;
}

@media (max-width:1050px){
  .container-flex{
    flex-direction: column;
  }
  .site-title, .subtitle{
    width: 100%;
  }
  main{
    max-width: 100%;
  }
  .sidebar{
    max-width: 100%;
  }
  
}
@media (max-width: 500px){
}

/* articles */
.article-featured {
    border-bottom: #707070 1px solid;
    padding-bottom: 2em;
    margin-bottom: 2em;
}
.article-recent {
    display: flex;
    flex-direction: column;
    margin-bottom: 2em;
}

.article-recent-main {
    order: 2;
}

.article-recent-secondary {
    order: 1;
}

@media (min-width: 675px) {
    .article-recent {
        flex-direction: row;
        justify-content: space-between;
    }
    
    .article-recent-main {
        width: 68%;
    }
    
    .article-recent-secondary {
        width: 30%;
    }
}

</style>
    
@endpush
</x-frontend.layouts.master>
