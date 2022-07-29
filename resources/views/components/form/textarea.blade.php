<x-form.form-wrapper >

  <x-form.label :title="$title" />
  
  <textarea type="{{ $type }}" rows="10" name="{{ $title }}" class="form-control editor @error("$title")
    is-invalid
  @enderror" id="{{ $title }}">{{ old("$title") }}
  </textarea>

  <x-error :name="$title" />

</x-form.form-wrapper>