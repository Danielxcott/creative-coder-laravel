@php
  use Illuminate\Support\Facades\Auth;
@endphp
<x-layout>
    <!-- single blog section -->
    <div class="container">
      <div class="row">
        <div class="col-md-6 mx-auto text-center">
          <img
            src="https://creativecoder.s3.ap-southeast-1.amazonaws.com/blogs/GOLwpsybfhxH0DW8O6tRvpm4jCR6MZvDtGOFgjq0.jpg"
            class="card-img-top"
            alt="..."
          />
          <h3 class="my-3">{{ $blog->title }}</h3>
          <div class="mb-3">
            <div class="text-bold h5">Author - <a href="/?username={{ $blog->author->username }}">{{ $blog->author->name }}</a></div>
            <a href="/?category={{ $blog->category->slug }}" class="text-decoration-none"><span class="badge bg-primary">{{ $blog->category->title }}</span> </a>
            <span>{{ $blog->created_at->format('d M Y') }}</span>
          </div>
            <div class="lh-md text-black-50 blog-description">
              {!! $blog->description !!}
            </div>
        </div>
        @auth
        <div class="text-center">
          <form action="{{ route('blog.subscribe',$blog->slug) }}" method="POST">
            @csrf
            @if (Auth::user()->isSubscribe($blog))
            <button class="btn btn-danger">Unsubscribe</button>
              @else
            <button class="btn btn-primary">Subscribe</button>
            @endif
          </form>
        </div>
        @endauth
      </div>
    </div>
    <section>
      <div class="col-md-8 mx-auto">
        @auth
        <x-card-wrapper >
          <x-comment-form :blog="$blog" />
        </x-card-wrapper>
        @else
        <p class="text-center">Please <a href="{{ route('auth.login') }}">login</a> to participate in this discussion.</p>
        @endauth
      </div>
    </section>
    <!--comment section -->
    @if($blog->comments->count())
    <x-comment-section :comments="$blog->comments()->latest()->paginate(3)" :id="$blog->id" />
    @endif
    <x-blogs-you-may-like :randomBlogs="$randomBlogs" />
</x-layout>

