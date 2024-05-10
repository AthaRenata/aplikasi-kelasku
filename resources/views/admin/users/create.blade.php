<x-layout>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-5 pb-2 mb-3 border-bottom">
        <h1 class="h2">
            <a href="/users" class="text-body-secondary" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Pengguna" ><i class="bi-people-fill fs-1"></i></a>
        <i class="bi-caret-right-fill fs-1"></i>
        Tambah Pengguna</h1>
        </div>
    
        <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link usernavtabs" data-toggle="tab" id="admin" href="#admins">Admin</a>
            </li>
            <li class="nav-item">
              <a class="nav-link usernavtabs" data-toggle="tab" id="student" href="#students">Siswa</a>
            </li>
          </ul>

          <div class="tab-content" id="tabs">
            <div class="tab-pane" id="admins">
                <div class="mt-2 p-3 text-body-secondary">
                    <form action="/users" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="role" value="1">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Cth. Nama Lengkap" value="{{old('name')}}" required>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                          </div>
                          <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Cth. nama@gmail.com" value="{{old('email')}}" required>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                          </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="******" required>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                          </div>
                          <div class="mb-3">
                            <label for="photo" class="form-label">Foto Profil (Opsional)</label>
                            <input class="form-control @error('photo') is-invalid @enderror" type="file" name="photo" id="photo">
                            @error('photo')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div>
                            <button class="btn btn-success">Simpan</button>
                          </div>
                    </form>
                </div>  
        </div>

        <div class="tab-pane" id="students">
            <div class="mt-2 p-3 text-body-secondary">
                <form action="/users" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="role" value="2">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Cth. Nama Lengkap" value="{{old('name')}}" required>
                        @error('name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="school_id" class="form-label">Sekolah</label>
                        <select name="school_id" id="school_id" class="form-select" required>
                            @foreach ($schools as $school)
                                <option value="{{$school->id}}">{{$school->name}}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="phone" class="form-label">No. Hp</label>
                        <input type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" placeholder="Cth. 081222333444" value="{{old('phone')}}" required>
                        @error('phone')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                      </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="******" required>
                        @error('password')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="photo" class="form-label">Foto Profil (Opsional)</label>
                        <input class="form-control @error('photo') is-invalid @enderror" type="file" name="photo" id="photo">
                        @error('photo')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <button class="btn btn-success">Simpan</button>
                      </div>
                </form>
            </div>  
        </div>
          </div>
</x-layout>