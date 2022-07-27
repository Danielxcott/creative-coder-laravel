<form action="{{ route('comment.store',$blog->slug) }}" method="post">
  @csrf
  <div class="">
    <textarea required name="comment" id="" class="form-control border border-0" cols="10" rows="5" placeholder="say something"></textarea>
    <div class="d-flex justify-content-end mt-3">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    <x-error name='comment' />
</form>