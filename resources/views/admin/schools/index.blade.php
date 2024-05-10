<x-layout>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-5 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Sekolah</h1>
        </div>

<div class="d-flex justify-content-end mb-3">
        <a href="/schools/create" class="btn btn-primary text-decoration-none"><i class="bi-plus-circle px-1"></i> Tambah Sekolah</button></a>
    </div>

    @if (session()->has('success'))
    <div class="alert alert-success w-100 mt-3 d-flex align-items-center justify-content-between" role="alert">
      <div>
        {!! session('success') !!}
      </div>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-success">
                    <tr>
                        <th>#</th>
                        <th>NPSN</th>
                        <th>Nama Sekolah</th>
                        <th>Aksi</th>
                        </tr>
                </thead>
                <tbody>
                @foreach ($schools as $school)
                        <tr>
                            <td>{{ $schools->firstItem() + $loop->index}}</td>
                            <td>{{$school->npsn}}</td>
                            <td>{{$school->name}}</td>
                            <td>
                                <a href="/schools/{{$school->id}}/edit" class="btn btn-warning"  data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Ubah Data"><i class="bi-pencil"></i></a>
                                <form action="/schools/{{$school->id}}" method="POST" class="d-inline">
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
                {{$schools->links()}}
              </div>
        </div>


</x-layout>