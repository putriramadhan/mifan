<nav class="navbar navbar-expand-md navbar-light fixed-top bg-white" >
  <div class="container" style=color:black;>
  <a class="navbar-brand @yield('home')" href="/"><img src="/upload/logo/{{$logo->gambar}}" width="100px" height="60px"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="/navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarScroll">
    <ul class="navbar-nav mr-auto my-2 my-lg-0 navbar-nav-scroll" style="max-height: 100px;">

      <li class="dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="dropdown2" role="button" data-toggle="dropdown" aria-expanded="false">
          Semua Tiket
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdown2">
            @foreach ($jenis as $row)
              <a class="dropdown-item" href="/artikel-jenis/{{$row->slug}}">{{$row->nama}}</a>
            @endforeach
        </div>

      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
          Blog
        </a>
        <div class="dropdown-menu"  aria-labelledby="navbarScrollingDropdown">
            @foreach ($kategori as $row)
              <a class="dropdown-item" href="/artikel-kategori/{{$row->slug}}">{{$row->nama}}</a>
            @endforeach
        </div>
      </li>

    </ul>
    <ul class="navbar-nav my-lg-0">
     @auth
     @role('admin|pemilik')
       <li class="nav-item">
          <a class="nav-link" href="/dashboard">Dashboard</a>
       </li>
    @else
     <!-- Nav Item - User Information -->
     <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-black-600 small">{{Auth::user()->name}}</span>
            <img class="img-profile rounded-circle" height="50px" width= "50px"
                src="/vendor/sb-admin/img/undraw_profile.svg">
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="userDropdown">
            <a class="dropdown-item" href="/detail">
                <i class="fas fa-history"></i></i>
                Riwayat Transaksi Tiket Masuk
            </a>
            <a class="dropdown-item" href="/detailpenginapan">
                <i class="fas fa-history"></i></i>
                Riwayat Transaksi Reservasi Penginapan
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
            </a>
        </div>
    </li>
    @endrole

            @else
            <li class="nav-item">
          <a class="nav-link" href="/login">Login</a>
       </li>
       <li class="nav-item">
          <a class="nav-link" href="register">Registrasi</a>
       </li>
    @endauth
   </ul>
  </div>
  </div>
</nav>
