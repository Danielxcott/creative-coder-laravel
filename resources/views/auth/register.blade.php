<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <h3 class="my-3">Register Form</h3>
                <div class="card p-4 my-4 shadow-sm">
                    <form action="{{ route('register.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                              <input type="name" name="name" class="form-control @error('name')
                                is-invalid
                              @enderror" value="{{ old('name') }}" id="name">
                            </div>
                            <x-error name="name" />
                          </div>
                          <div class="mb-3">
                            <label for="username" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                              <input type="name" name="username" value="{{ old('username') }}" class="form-control @error('username') is-invalid @enderror" id="username">
                            </div>
                            <x-error name="username" />

                          </div>
                        <div class="mb-3">
                          <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                          <div class="col-sm-10">
                            <input type="email" name="email" class="form-control @error('email')
                              is-invalid
                            @enderror" value="{{ old('email') }}" id="inputEmail3">
                          </div>
                          <x-error name="email" />
                        </div>
                        <div class="mb-3">
                          <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                          <div class="col-sm-10">
                            <input type="password" name="password" class="form-control" id="inputPassword3">
                          </div>
                          <x-error name="password" />
                        </div>
                       
                        <button type="submit" class="btn btn-primary">Sign up</button>
                      </form>
                </div>
            </div>
        </div>
    </div>


</x-layout>