<div class="dropdown">
  <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
   {{-- {{ isset($currentCategory) ? $currentCategory->title : "Filter by Category" }} --}}
   {{ request('category') ?? "Filter by Category" }}
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="/">All</a></li>
    @foreach ($categories as $category )
    <li><a class="dropdown-item" href="/?category={{ $category->slug }}{{ request('search') ? "&search=".request('search') : ""   }}{{ request('username') ? "&usernmae=".request('username') : "" }}">{{ $category->title }}</a></li>
    @endforeach
  </ul>
</div>