@props(['comments','id'])
<div class="container">
<div class="col-md-8 mx-auto">
  <h5 class="my-3 text-secondary">Comments ({{ $countComments }})</h5>
  @foreach ($comments as $comment )
  <x-single-comment :comment="$comment" />
  @endforeach
</div>

</div>