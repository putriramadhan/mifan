@extends('sb-admin/app')
@section('title', 'transaksi')
@section('transaksi', 'active')
@section('pemesanantiket', 'show')
@section('pemesanantiket-active', 'active')


@section('content')
  {{--flashdata--}}
  {!!session('status')!!}
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Transaksi</h1>
<p>
    <form method="GET">
        <div class="row">
            <div class="col-lg-3">
                <label>Tanggal Awal</label>
                <input name="tglawal" id="tglawal" type="date" size="10" autocomplete="off">
            </div>
            <div class="col-lg-3">
                <label>Tanggal Akhir</label>
                <input name="tglakhir" id="tglakhir" type="date" size="10" autocomplete="off">
            </div>
            <div class="row pad">
            <div class="col-xs-3">
            <a href="" onclick="this.href='/cetakpertanggaltransaksi/'+document.getElementById('tglawal').value
            + '/' +document.getElementById('tglakhir').value" class="btn btn-dark btn-sm" target="_blank"><i class="fas fa-print"></i>Cetak Laporan Pertanggal</a>
            </div>
            <div class="col-xs-3">
            <a href="/cetaktransaksi" class="btn btn-primary btn-sm" target="_blank"><i class="fas fa-print"></i> Cetak Semua</a>
            </div>
            </div>
        </div>
    </form>
</p>
    @if($transaksi[0])
    {{--table--}}
    <table class="table mt-4 table-hover table-bordered">
    <thead>
    <tr style="font-size: small">
      <th scope="col" width="8%">No</th>
      <th scope="col">Tanggal</th>
      <th scope="col">Tiket</th>
      <th scope="col">Tanggal Dipilih</th>
      <th scope="col">Nama</th>
      <th scope="col">Email</th>
      <th scope="col" width="8%">NO HP</th>
      <th scope="col">Asal Domisili</th>
      <th scope="col">Jumlah</th>
      <th scope="col">Total</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($transaksi as $row)
    <tr style="font-size: small">
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{ Carbon\Carbon::parse($row['created_at'])->translatedformat('d F Y') }}</td>
      <td>{{$row->tiket->judul}}</td>
      <td>{{ Carbon\Carbon::parse($row['tanggal'])->translatedformat('d F Y') }}</td>
      <td>{{$row->nama}}</td>
      <td>{{$row->email}}</td>
      <td>{{$row->telp}}</td>
      <td>{{$row->alamat}}</td>
      <td>{{$row->jumlah}}</td>
      <td>Rp{{$row->total}}</td>
      <td>
         <div class="btn-group" role="group" aria-label="Basic example">
                @if($row->status == 1)
                    <button  class="btn btn-primary btn-sm">Belum dibayar</button >
                @elseif($row->status == 2)
                    <button  class="btn btn-warning btn-sm">Menunggu Konfirmasi</button >
                @elseif($row->status == 3)
                    <button  class="btn btn-success btn-sn">Selesai</button >
                @else
                    <button  class="btn btn-dark btn-sm">Ditolak</button >
                @endif
         </div>
       </td>

    </tr>
    @endforeach
  </tbody>
</table>
{{$transaksi->links()}}

@else
 @if (session('search'))
     {!!session('search')!!}
     @else
       <div class="alert alert-danger mt-4" role="alert">
        Anda belum mempunyai data
       </div>
 @endif
@endif

@endsection

@section('search-url', '/transaksi/search')
@section('search')
  @include('sb-admin/search')
@endsection
