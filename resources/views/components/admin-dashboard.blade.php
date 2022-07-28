<x-layout >
  <div class="container">
    <div class="row">
      <div class="col-md-2 ">
        <ul class="list-group mt-3">
          <li class="list-group-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
          <li class="list-group-item"><a href="{{ route('blog.create') }}">Create Blog</a></li>
        </ul>
      </div>
      <div class="col-md-10">
        {{ $slot }}
      </div>
    </div>
  </div>

</x-layout>