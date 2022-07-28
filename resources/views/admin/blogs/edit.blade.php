<x-admin-dashboard>
    <x-card-wrapper>
        <h3>Edit Blog</h3>
        <form action="{{ route('update.blog',$blog->slug) }}" enctype="multipart/form-data" method="post">
            @csrf
            @method('put')
            <x-form.input title="title" value="{{ $blog->title }}"/>
            <x-form.input title="slug" value="{{ $blog->slug }}" />
            <x-form.input title="thumbnail" type="file" />
            @isset($blog->thumbnail)
            <img src="{{ asset('storage/thumbnail/'.$blog->thumbnail) }}" width="30px" height="30px" alt="">
            @endisset
            <x-form.textarea title="description" value="{{ $blog->description }}" />
            <x-form.category-list title="category" :categories="$categories" value="{{ $blog->category_id }}" />
            <button type="submit" class="btn btn-primary">Update</button>
            </form>
       </x-card-wrapper>
</x-admin-dashboard>