<header class="z-0 w-100 navbar justify-content-between sticky-top bg-theme1 flex-md-nowrap p-0 shadow" data-bs-theme="dark">
<a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-5 text-white" href="/dashboard">Aplikasi Kelasku</a>
<p class="navbar-nav d-none d-lg-block text-white fs-6 px-3">Selamat Datang, {{Auth::user()->name}}</p>
<ul class="navbar-nav flex-row d-md-none">
  {{-- <li class="nav-item text-nowrap">
    <button class="nav-link px-3 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSearch" aria-controls="navbarSearch" aria-expanded="false" aria-label="Toggle search">
      <svg class="bi"><use xlink:href="#search"/></svg>
    </button>
  </li> --}}
  <li class="nav-item text-nowrap">
    <button class="nav-link px-3 text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <svg class="bi"><use xlink:href="#list"/></svg>
    </button>
  </li>
</ul>

{{-- <div id="navbarSearch" class="navbar-search w-100 collapse">
  <input class="form-control w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
</div> --}}
</header>

<div class="container-fluid">
<div class="row">
  <div class="sidebar border border-right col-md-3 col-lg-2 pt-4 position-sticky bg-theme-gradient">
    <div class="offcanvas-md offcanvas-end bg-theme-gradient vh-100" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title text-white" id="sidebarMenuLabel">Aplikasi Kelasku</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
        <ul class="ps-4 navbar-nav flex-column">
          <li class="nav-item">
            <a class="nav-link fs-6 d-flex align-items-center gap-2 linkwborder {{ (request()->is('dashboard*')) ? 'activelink' : '' }}" href="/dashboard">
              <i class="bi-speedometer2"></i>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link fs-6 d-flex align-items-center gap-2 linkwborder {{ (request()->is('schools*')) ? 'activelink' : '' }}" href="/schools">
              <i class="bi-buildings-fill"></i>
              Sekolah
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link fs-6 d-flex align-items-center gap-2 linkwborder {{ (request()->is('users*')) ? 'activelink' : '' }}" href="/users">
              <i class="bi-people-fill"></i>
              Pengguna
            </a>
          </li>
        </ul>

        <hr class="my-3">

        <ul class="ps-4 navbar-nav flex-column mb-auto">
          <li class="nav-item">
            <span class="fs-6">
              <img src="{{asset(Auth::user()->photo ?? 'storage/image/profile.jpg')}}" alt="profile" width="40" height="40" class="rounded-circle"> {{Auth::user()->name}}
            </span>
          </li>
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 linkwborder" href="#">
              <i class="bi-door-closed"></i>
              <form action="/logout" method="POST">
                @csrf
            <button class="btn text-danger" onclick="return confirm('Yakin akan keluar dari aplikasi?')">Sign out</button>
            </form>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 bg-theme4">
    
      
    