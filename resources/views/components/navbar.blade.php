@php
  use Illuminate\Support\Facades\Auth;
@endphp

<nav class="navbar navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="/">Creative Coder</a>
    <div class="d-flex">
      <a href="#home" class="nav-link">Home</a>
      <a href="#blogs" class="nav-link">Blogs</a>
      @guest
      <a href="{{ route('register.create') }}" class="nav-link">Register</a>
      <a href="{{ route('auth.login') }}" class="nav-link">Login</a>
      @else
      <div class="dropdown">
        <button class="btn text-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
         {{ Auth::user()->name }}
        </button>
        <ul class="dropdown-menu">
          @can('admin')
          <li  class="dropdown-item" ><a class="text-decoration-none text-dark" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
          @endcan
          <form action="{{ route('auth.logout') }}" method="post" id="logoutForm">
            @csrf
          </form>
          <li><button class="dropdown-item btn-link" type="submit" form="logoutForm" href="#">logout</button></li>
        </ul>
      </div>
      @endguest
      <a href="#subscribe" class="nav-link">Subscribe</a>
    </div>
  </div>
</nav>