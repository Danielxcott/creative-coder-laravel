<div class="dropdown">
  <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
   {{-- {{ isset($currentCategory) ? $currentCategory->title : "Filter by Category" }} --}}
   {{ request('category') ?? "Filter by Category" }}
  </button>
  <ul class="dropdown-menu">
    @foreach ($categories as $category )
    <li><a class="dropdown-item" href="/?category={{ $category->slug }}">{{ $category->title }}</a></li>
    @endforeach
  </ul>
</div>