<x-layout>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-5 pb-2 mb-3 border-bottom">
        <h1 class="h2">
            <a href="/users" class="text-body-secondary" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Pengguna" ><i class="bi-people-fill fs-1"></i></a>
        <i class="bi-caret-right-fill fs-1"></i>
        Ubah Pengguna</h1>
        </div>

          @if ($user->role==1)
          
            <div class="mt-2 p-3 text-body-secondary">
                <form action="/users/{{$user->id}}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="role" value="1">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Cth. Nama Lengkap" value="{{old('name',$user->name)}}" required>
                        @error('name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                        </div>
                        <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Cth. nama@gmail.com" value="{{old('email',$user->email)}}" required>
                        @error('email')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                        </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="******">
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
        
          @else

            <div class="mt-2 p-3 text-body-secondary">
                <form action="/users/{{$user->id}}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="role" value="2">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Cth. Nama Lengkap" value="{{old('name',$user->name)}}" required>
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
                                @if($school->id==$user->school_id)
                                    <option value="{{$school->id}}" selected>{{$school->name}}</option>
                                @else
                                    <option value="{{$school->id}}">{{$school->name}}</option>
                                @endif
                            @endforeach
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="phone" class="form-label">No. Hp</label>
                        <input type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" placeholder="Cth. 081222333444" value="{{old('phone',$user->phone)}}" required>
                        @error('phone')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                      </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="******">
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
                        <button class="btn btn-success">Ubah</button>
                      </div>
                </form>
            </div>  

        @endif
</x-layout>