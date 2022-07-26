@props(['blogs'])
<section class="container text-center" id="blogs">
  <h1 class="display-5 fw-bold mb-4">Blogs</h1>
  <div class="">
    
    <x-category-dropdown />

  </div>
  <form action="" class="my-3">
    <div class="input-group mb-3">
      <input
        type="text"
        name="search"
        autocomplete="false"
        value="{{ request('search') }}"
        class="form-control"
        placeholder="Search Blogs..."
      />
      <button
        class="input-group-text bg-primary text-light"
        id="basic-addon2"
        type="submit"
      >
        Search
      </button>
    </div>
  </form>
  <div class="row">
    @forelse ($blogs as $blog )
    <div class="col-md-4 mb-4">
      <x-blog-card :blog="$blog" ></x-blog-card>
     </div>
     @empty
     <p>There is no article at this point!</p>
    @endforelse
  </div>
</section>