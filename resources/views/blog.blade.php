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
            <div class="text-bold h5">Author - <a href="/user/{{ $blog->author->username }}">{{ $blog->author->name }}</a></div>
            <a href="/?category={{ $blog->category->slug }}" class="text-decoration-none"><span class="badge bg-primary">{{ $blog->category->title }}</span> </a>
            <span>{{ $blog->created_at->format('d M Y') }}</span>
          </div>
          <p class="lh-md text-black-50">
            {{ $blog->description }}
          </p>
        </div>
      </div>
    </div>

    <!-- subscribe new blogs -->
    <x-subscribe />
    <x-blogs-you-may-like :randomBlogs="$randomBlogs" />
</x-layout>

