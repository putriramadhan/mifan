 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-text-center">Mifan</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item @yield('dashboard')">
    <a class="nav-link" href="/dashboard">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

@role('admin')
<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item @yield('karcis-active')">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#karcis"
        aria-expanded="true" aria-controls="karcis">
        <i class="fas fa-fw fa-folder"></i>
        <span>Tiket</span>
    </a>
    <div id="karcis" class="collapse @yield('karcis')" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item @yield('jenis')" href="/jenis">Jenis Tiket Umum</a>
        </div>
    </div>
</li>


<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item @yield('main-active')">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#main"
        aria-expanded="true" aria-controls="main">
        <i class="fas fa-fw fa-folder"></i>
        <span>Artikel</span>
    </a>
    <div id="main" class="collapse @yield('main')" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item @yield('post')" href="/post">Blog</a>
            <a class="collapse-item @yield('kategori')" href="/kategori">Kategori</a>
            <a class="collapse-item @yield('slider')" href="/slider">Slider</a>
        </div>
    </div>
</li>


    <!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed @yield('user-active')" href="#" data-toggle="collapse" data-target="#user"
        aria-expanded="true" aria-controls="user">
        <i class="fas fa-user-friends"></i>
        <span>User</span>
    </a>
    <div id="user" class="collapse @yield('user')" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item @yield('admin')" href="/admin">Admin</a>
            <a class="collapse-item @yield('pemilik')" href="/pemilik">Pemilik</a>
            <a class="collapse-item @yield('customer')" href="/customer">Customer</a>
        </div>
    </div>
</li>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item @yield('transaksi-active')">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pemesanantiket"
        aria-expanded="true" aria-controls="pemesanantiket">
        <i class="fas fa-money-check"></i>
        <span>Tiket Masuk</span>
    </a>
    <div id="pemesanantiket" class="collapse @yield('pemesanantiket')" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item @yield('tiket')" href="/tiket">Tiket Masuk</a>
            <a class="collapse-item @yield('transaksi')" href="/transaksi">Transaksi</a>
            <a class="collapse-item @yield('konfirmasi')" href="/konfirmasi">Konfirmasi</a>
        </div>
    </div>
</li>


<li class="nav-item @yield('transaksipenginapan-active')">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pemesananpenginapan"
        aria-expanded="true" aria-controls="pemesananpenginapan">
        <i class="fas fa-money-check"></i>
        <span>Penginapan</span>
    </a>
    <div id="pemesananpenginapan" class="collapse @yield('pemesananpenginapan')" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item @yield('tipe')" href="/tipe">Tipe Penginapan</a>
            <a class="collapse-item @yield('transaksipenginapan')" href="/transaksipenginapan">Transaksi</a>
            <a class="collapse-item @yield('konfirmasipenginapan')" href="/konfirmasipenginapan">Konfirmasi</a>
        </div>
    </div>

</li>



<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item @yield('pengaturan-active')">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pengaturan"
        aria-expanded="true" aria-controls="pengaturan">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Pengaturan</span>
    </a>
    <div id="pengaturan" class="collapse @yield('pengaturan')" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item @yield('logo')" href="/logo">Logo</a>
            <a class="collapse-item @yield('footer')" href="/footer">Footer</a>
            <a class="collapse-item @yield('rekening')" href="/rekening">Rekening</a>
        </div>
    </div>
</li>
@endrole
@role('pemilik')

<li class="nav-item @yield('daftargrafik-active')">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#daftargrafik"
        aria-expanded="true" aria-controls="daftar-grafik">
        <i class="fas fa-chart-area"></i>
        <span>Grafik Bulanan</span>
    </a>
    <div id="daftargrafik" class="collapse @yield('daftargrafik')" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item @yield('grafikpenginapan')" href="/grafikpenginapan">Grafik Penginapan</a>
            <a class="collapse-item @yield('grafiktiketmasuk')" href="/grafiktiketmasuk">Grafik Tiket Masuk</a>
        </div>
    </div>
</li>

<li class="nav-item @yield('daftartransaksi-active')">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#daftartransaksi"
        aria-expanded="true" aria-controls="daftartransaksi">
        <i class="fas fa-wallet"></i></i>
        <span>Daftar Transaksi</span>
    </a>
    <div id="daftartransaksi" class="collapse @yield('daftartransaksi')" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item @yield('transaksitiketmasuk')" href="/pemiliktransaksitiketmasuk">Transaksi Tiket Masuk</a>
            <a class="collapse-item @yield('transaksipenginapan')" href="/pemiliktransaksipenginapan">Transaksi Penginapan</a>
        </div>
    </div>
</li>
@endrole


<!-- Divider -->
<hr class="sidebar-divider">


<!-- Nav Item - Dashboard -->
<li class="nav-item">
    <a class="nav-link" href="/">
    <i class="fas fa-eye"></i>
        <span>Halaman Depan</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->
