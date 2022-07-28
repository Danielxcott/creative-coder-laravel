<x-layout>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-8">
                <x-card-wrapper>
                    <h3>Upload Blog</h3>
                    <form action="{{ route('blog.store') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                            <input type="title" name="title" class="form-control @error('title')
                                is-invalid
                            @enderror" value="{{ old('title') }}" id="title">
                            </div>
                            <x-error name="email" />
                        </div>
                        <div class="mb-3">
                            <label for="slug" class="col-sm-2 col-form-label">Slug</label>
                            <div class="col-sm-10">
                            <input type="slug" name="slug" class="form-control @error('slug')
                                is-invalid
                            @enderror" value="{{ old('slug') }}" id="slug">
                            </div>
                            <x-error name="email" />
                        </div>
                        <div class="mb-3">
                            <label for="thumbnail" class="col-sm-2 col-form-label">Thumbnail</label>
                            <div class="col-sm-10">
                                <input type="file" name="thumbnail" class="form-control @error('thumbnail')
                                    is-invalid
                                @enderror">
                            </div>
                            <x-error name="thumbnail" />
                        </div>
                        <div class="mb-3">
                            <label for="description" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                            <textarea type="description" rows="10" name="description" class="form-control" id="description">{{ old('description') }}
                            </textarea>
                            </div>
                            <x-error name="description" />
                        </div>
                        <div class="mb-3">
                            <label for="category" class="col-sm-2 col-form-label">Category</label>
                            <div class="col-sm-10">
                                <select name="category" id="category" class="form-control  custom-select-lg @error('category')
                                    is-invalid
                                @enderror">
                                    <option selected disabled>Select Category</option>
                                    @foreach ($categories as $category )
                                       <option {{ $category->id == old('category') ? "selected" : "" }} value="{{ $category->id }}">{{ $category->title }}</option> 
                                    @endforeach
                                </select>
                                <x-error name="category" />
                            </div>
                        </div>
                                       
                        <button type="submit" class="btn btn-primary">Upload</button>
                        </form>
                   </x-card-wrapper>
            </div>
        </div>
    </div>
    </x-layout>