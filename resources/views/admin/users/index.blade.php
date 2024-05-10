<x-layout>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-5 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Pengguna</h1>
        </div>

        <div class="d-flex justify-content-end mb-3">
            <a href="/users/create" class="btn btn-primary text-decoration-none"><i class="bi-plus-circle px-1"></i> Tambah Pengguna</button></a>
        </div>

        @if (session()->has('success'))
        <div class="alert alert-success w-100 mt-3 d-flex align-items-center justify-content-between" role="alert">
          <div>
            {!! session('success') !!}
          </div>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    
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
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-info">
                        <tr>
                            <th>#</th>
                            <th>Foto Profil</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Aksi</th>
                            </tr>
                    </thead>
                    <tbody>
                    @foreach ($admins as $admin)
                            <tr>
                                <td>{{ $admins->firstItem() + $loop->index}}</td>
                                <td><img src="{{asset($admin->photo ?? 'storage/image/profile.jpg')}}" alt="profile" width="80" height="80" class="rounded-circle"></td>
                                <td>{{$admin->name}}</td>
                                <td>{{$admin->email}}</td>
                                <td>
                                    <a href="/users/{{$admin->id}}/edit" class="btn btn-warning"  data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Ubah Data"><i class="bi-pencil"></i></a>
                                    <form action="/users/{{$admin->id}}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger" onclick="return confirm('Yakin akan hapus data ini?')"  data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Hapus Data"><i class="bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                  </table>
                  <div class="mt-4 d-flex justify-content-end">
                    {{$admins->links()}}
                  </div>
            </div>
        </div>

        <div class="tab-pane" id="students">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-info">
                        <tr>
                            <th>#</th>
                            <th>Foto Profil</th>
                            <th>Nama</th>
                            <th>No. Hp</th>
                            <th>Nama Sekolah</th>
                            <th>Aksi</th>
                            </tr>
                    </thead>
                    <tbody>
                    @foreach ($students as $student)
                            <tr>
                                <td>{{ $students->firstItem() + $loop->index}}</td>
                                <td><img src="{{asset($student->photo ?? 'storage/image/profile.jpg')}}" alt="profile" width="80" height="80" class="rounded-circle"></td>
                                <td>{{$student->name}}</td>
                                <td>{{$student->phone}}</td>
                                <td>{{$student->school->name}}</td>
                                <td>
                                    <a href="/users/{{$student->id}}/edit" class="btn btn-warning"  data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Ubah Data"><i class="bi-pencil"></i></a>
                                    <form action="/users/{{$student->id}}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger" onclick="return confirm('Yakin akan hapus data ini?')"  data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Hapus Data"><i class="bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                  </table>
                  <div class="mt-4 d-flex justify-content-end">
                    {{$students->links()}}
                  </div>
            </div>
        </div>
          </div>
</x-layout>