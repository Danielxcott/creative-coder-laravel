@props(['blog'])
<div class="card">
  <img
    src="{{ asset('storage/thumbnail/'.$blog->thumbnail) }}"
    class="card-img-top"
    alt="..."
  />
  <div class="card-body">
    <h3 class="card-title">{{ $blog->title }}</h3>
    <p class="fs-6 text-secondary">
      <a href="/?username={{ $blog->author->username }}{{ request('search') ? "&search=".request('search') : "" }}{{ request('category') ? "&category=".request('category') : "" }}">{{ $blog->author->name }}</a>
      <span> - {{ $blog->created_at->diffForHumans() }}</span>
    </p>
    <div class="tags my-3">
      <a href="/?category={{ $blog->category->slug }}{{ request('search') ? "&search=".request('search') : "" }}{{ request('username') ? "&username=".request('username') : "" }}"><span class="badge bg-primary">{{ $blog->category->title }}</span> </a>
    </div>
    <p class="card-text">
      {{ $blog->excerpt }}
    </p>
    <a href="/blog/{{ $blog->slug }}" class="btn btn-primary">Read More</a>
  </div>
</div>