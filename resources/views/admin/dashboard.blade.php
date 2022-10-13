@extends('sb-admin/app')
@section('title', 'Dashboard')
@section('dashboard', 'active')

@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><b>Dashboard</b></h1>
        @role('pemilik')
        <div class="row pad">
        <div class="col-xs-3">
            <a href="/cetaktiketadmin" class="btn btn-info btn-sm" target="_blank"><i class="fas fa-download fa-sm text-white-50"></i> Laporan Transaksi Tiket Masuk</a>
            </div>
            <div class="col-xs-3">
            <a href="/cetakpenginapanadmin" class="btn btn-primary btn-sm" target="_blank"><i class="fas fa-download fa-sm text-white-50"></i> Laporan Transaksi Penginapan</a>
            </div>
        </div>
        @endrole
    </div>
@role('admin')
<div class="card border-bottom-primary">
        <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">Blog</h6>
        </div>
</div>
</br>
<!-- Content Row -->
<div class="row">
<!-- Jumlah Postingan Blog-->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Jumlah Blog</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$jumlah_post}}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Jumlah Kategori Blog -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Jumlah Kategori</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$jumlah_kategori}}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-file fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</br>
@endrole
@role('pemilik|admin')
<div class="card border-bottom-primary">
        <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">Transaksi Tiket Masuk</h6>
        </div>
</div>
</br>

<div class="row">
<!-- Transaksi Tiket Masuk-->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Semua Transaksi
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$jumlah_transaksi}}</div>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Transaksi Tiket Masuk Belum Dibayar -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Belum Bayar
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$jumlah_belumbayar}}</div>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Transaksi Tiket Masuk Menunggu Konfirmasi -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                        Menunggu Konfirmasi</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$jumlah_menunggu}}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Transaksi Tiket Masuk Ditolak -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-dark shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                        Jumlah ditolak</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$jumlah_ditolak}}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Transaksi Tiket Masuk Dikonfirmasi -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Telah Dikonfirmasi</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$jumlah_dikonfirmasi}}</div>
                </div>
                <div class="col-auto">
                <i class="fas fa-money-check fa-2x text-gray-300"></i></i>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endrole
<div class="card border-bottom-primary">
        <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">Transaksi Penginapan</h6>
        </div>
</div>
</br>
<!-- Content Row -->
<div class="row">

<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Semua Transaksi
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$jumlah_transaksipenginapan}}</div>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Transaksi Tiket Masuk Belum Dibayar -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Belum Bayar
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$jumlah_belumbayarpenginapan}}</div>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                        Menunggu Konfirmasi</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$jumlah_menunggupenginapan}}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Transaksi Tiket Masuk Ditolak -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-dark shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                        Jumlah ditolak</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$jumlah_ditolakpenginapan}}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Transaksi Tiket Masuk Dikonfirmasi -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Telah Dikonfirmasi</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$jumlah_dikonfirmasipenginapan}}</div>
                </div>
                <div class="col-auto">
                <i class="fas fa-money-check fa-2x text-gray-300"></i></i>
                </div>
            </div>
        </div>
    </div>
</div>





</div>

@endsection
