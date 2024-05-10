<x-layout>
    <div class="w-100 vh-100 position-absolute" id="bg-login"></div>
    
    @if (session()->has('loginError'))
      <div class="position-absolute mx-auto start-0 end-0 alert alert-danger w-50 mt-5 d-flex align-items-center justify-content-between" role="alert">
        <div>
          {{session('loginError')}}
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

    <div class="d-flex justify-content-center align-items-center vh-100 z-20">
    <div class="col-12 col-md-8 col-lg-6 col-xl-5">

    <div class="card text-secondary" id="bg-login-card">
        <div class="card-header text-center bg-theme3">
          <h3>APLIKASI KELASKU</h3>
        </div>
        <form method="POST" method="/" autocomplete="off">
            @csrf
        <div class="card-body bg-theme4">
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Email</label>
                  <input name="email" type="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="nama@gmail.com" class="form-control @error('email') is-invalid @enderror"  autofocus required value="{{ old('email') }}"/>
                  @error('email')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="******" required>
                </div>
        </div>
        <div class="card-footer text-center bg-theme3">
            <button type="submit" class="btn btn-primary">Login</button>
        </div>
    </form>  
      </div>
    </div>
    </div>
</x-layout>