<x-card-wrapper>
  <div class="d-flex">
    <div>
      @if($comment->author->avatar == null)
      <img src="{{ asset('user.png') }}" alt="" class="profile">
      @else
      <img src="{{ $comment->author->avatar }}" alt="" class="profile">
      @endif
    </div>
    <div class="ms-3">
      <h6>{{ $comment->author->name }}</h6>
      <div class="text-secondary">{{ $comment->created_at->diffForHumans() }}</div>
    </div>
  </div>
  <p class="mt-1">
   {{ $comment->comment }}
  </p>
</x-card-wrapper>