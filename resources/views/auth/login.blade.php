<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <h3 class="my-3">Login Form</h3>
                <div class="card p-4 my-4 shadow-sm">
                    <form action="{{ route('auth.checkLogin') }}" method="post">
                        @csrf
                        <div class="mb-3">
                          <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                          <div class="col-sm-10">
                            <input type="email" name="email" class="form-control @error('email')
                              is-invalid
                            @enderror" value="{{ old('email') }}" id="inputEmail3">
                          </div>
                          @error('email')
                            <div class="text-danger">
                              {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                          <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                          <div class="col-sm-10">
                            <input type="password" name="password" class="form-control" id="inputPassword3">
                          </div>
                          @error('password')
                            <div class="text-danger">
                              {{ $message }}
                            </div>
                            @enderror
                        </div>
                       
                        <button type="submit" class="btn btn-primary">Sign in</button>
                      </form>
                </div>
            </div>
        </div>
    </div>


</x-layout>