<x-layout>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-5 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
          <div class="card h-100 text-center">
            <i class="bi-person-gear display-1"></i>
            <div class="card-body">
              <h5 class="card-title">Jumlah Admin</h5>
              <p class="card-text display-5">{{$admins}}</p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100 text-center">
            <i class="bi-person-vcard display-1"></i>
            <div class="card-body">
              <h5 class="card-title">Jumlah Siswa</h5>
              <p class="card-text display-5">{{$students}}</p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100 text-center">
            <i class="bi-buildings-fill display-1"></i>
            <div class="card-body">
              <h5 class="card-title">Jumlah Sekolah</h5>
              <p class="card-text display-5">{{$schools}}</p>
            </div>
          </div>
        </div>
      </div>
    
</x-layout>