<x-layout>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-8">
                <x-card-wrapper>
                    <h3>Upload Blog</h3>
                    <form action="{{ route('blog.store') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <x-form.input title="title" />
                        <x-form.input title="slug" />
                        <x-form.input title="thumbnail" type="file" />
                        <x-form.textarea title="description" />
                        <x-form.category-list title="category" :categories="$categories" />
                        <button type="submit" class="btn btn-primary">Upload</button>
                        </form>
                   </x-card-wrapper>
            </div>
        </div>
    </div>
    </x-layout>