<x-admin-dashboard >
    <h3>Blogs</h3>
    <x-card-wrapper >
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
              @foreach ($blogs as $key => $blog )
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $blog->title }}</td>
                    <td>{{ $blog->excerpt }}</td>
                    <td class="text-nowrap">
                        <a href="{{ route('edit.blog',$blog->slug) }}" class="btn btn-outline-warning">Edit</a>
                        <form action="{{ route('destroy.blog',$blog->slug) }}" class="d-inline-block" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-outline-danger">Del</button>
                        </form>
                    </td>
                  </tr>
              @endforeach
            </tbody>
            {{ $blogs->onEachSide(1)->links() }}
          </table>
    </x-card-wrapper>
</x-admin-dashboard>