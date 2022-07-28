<x-form.form-wrapper >

  <x-form.label :title="$title" />
  <div class="col-sm-10">
  <input type="{{ $type }}" name="{{ $title }}" class="form-control @error("$title")
      is-invalid
  @enderror" value="{{ old('$title') }}" id="{{ $title }}">
  </div>
  <x-error :name="$title" />

</x-form.form-wrapper>