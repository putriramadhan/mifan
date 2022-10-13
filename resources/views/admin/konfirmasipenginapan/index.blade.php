@extends('sb-admin/app')
@section('title', 'konfirmasipenginapan')
@section('konfirmasipenginapan', 'active')
@section('prosespenginapan', 'show')
@section('prosespenginapan-active', 'active')


@section('content')
  {{--flashdata--}}
  {!!session('status')!!}
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Bukti Pembayaran</h1>

    @if($konfirmasipenginapan[0])
    {{--table--}}
    <table class="table mt-4 table-hover table-bordered">
    <thead>
    <tr>
      <th scope="col" width="8%">No</th>
      <th scope="col">Username</th>
      <th scope="col">Bukti Pembayaran</th>
      <th scope="col">Catatan</th>
      <th scope="col">Status</th>
      <th scope="col">Aksi</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($konfirmasipenginapan as $row)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$row->user->name}}</td>
      <td><img src="/upload/buktipenginapan/{{$row->gambar}}" alt="" width="80px" height="80px"></td>
      <td>{{$row->deskripsi}}</td>
      <td>
        <div class="btn-group" role="group" aria-label="Basic example">
                @if($row->status_order == 1)
                    <button class="btn btn-primary btn-sm">Belum dibayar</button>
                @elseif($row->status_order == 2)
                    <button class="btn btn-warning btn-sm">Menunggu Konfirmasi</button>
                @elseif($row->status_order == 3)
                    <button class="btn btn-success btn-sm">Selesai</button>
                @else
                    <button class="btn btn-dark btn-sm">Ditolak</button>
                @endif
        </div>
       </td>
      <td width="20%">
      <div class="btn-group" role="group" aria-label="Basic example">
          <a href="/konfirmasipenginapan/terima/{{$row->id_transaksi_penginapan}}"  class="btn btn-success btn-sm"><i class="fas fa-check-circle"></i></i>Terima</a>
          <a href="/konfirmasipenginapan/tolak/{{$row->id_transaksi_penginapan}}"  class="btn btn-dark btn-sm"><i class="fas fa-times-circle"></i></i></i>Tolak</a>
          <a href ="/konfirmasipenginapan/{{$row->id}}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i>Detail</a>
     </div>
     </td>
    </tr>
    @endforeach
  </tbody>
</table>
{{$konfirmasipenginapan->links()}}
@else
       <div class="alert alert-danger mt-4" role="alert">
        Anda belum mempunyai data
       </div>

@endif
@endsection

