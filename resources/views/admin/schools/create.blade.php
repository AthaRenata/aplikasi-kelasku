<x-layout>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-5 pb-2 mb-3 border-bottom text-body-secondary">
        <h1 class="h2">
            <a href="/schools" class="text-body-secondary" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Sekolah" ><i class="bi-buildings-fill fs-1"></i></a>
        <i class="bi-caret-right-fill fs-1"></i> Form Tambah Sekolah</h1>
        </div>

        <div class="mt-2 p-3 text-body-secondary">
            <form action="/schools" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="npsn" class="form-label">NPSN</label>
                    <input type="npsn" class="form-control @error('npsn') is-invalid @enderror" name="npsn" id="npsn" placeholder="Cth. 12345678 (8 digit angka)" value="{{old('npsn')}}" required>
                    @error('npsn')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Sekolah</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Cth. SMK NEGERI 01 SEMARANG" value="{{old('name')}}" required>
                    @error('name')
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
</x-layout>