<x-form.form-wrapper>
  <x-form.label :title="$title" />
      <div class="col-sm-10">
          <select name="{{ $title }}" id="{{ $title }}" class="form-control  custom-select-lg @error("$title")
              is-invalid
          @enderror">
              <option selected disabled>Select Category</option>
              @foreach ($categories as $category )
                 <option {{ $category->id == old('category',$value) ? "selected" : "" }} value="{{ $category->id }}">{{ $category->title }}</option> 
              @endforeach
          </select>
          <x-error :name="$title" />
      </div>
  </x-form.form-wrapper>