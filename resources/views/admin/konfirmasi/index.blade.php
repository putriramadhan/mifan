@extends('sb-admin/app')
@section('title', 'konfirmasi')
@section('konfirmasi', 'active')
@section('proses', 'show')
@section('proses-active', 'active')


@section('content')
  {{--flashdata--}}
  {!!session('status')!!}
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Bukti Pembayaran</h1>

    @if($konfirmasi[0])
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
    @foreach ($konfirmasi as $row)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$row->user->name}}</td>
      <td><img src="/upload/bukti/{{$row->gambar}}" alt="" width="80px" height="80px"></td>
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
          <a href="/konfirmasi/terima/{{$row->id_transaksi}}"  class="btn btn-success btn-sm"><i class="fas fa-check-circle"></i></i>Terima</a>
          <a href="/konfirmasi/tolak/{{$row->id_transaksi}}"  class="btn btn-dark btn-sm"><i class="fas fa-times-circle"></i></i></i>Tolak</a>
          <a href ="/konfirmasi/{{$row->id}}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i>Detail</a>
       <div>
     </td>
    </tr>
    @endforeach
  </tbody>
</table>
{{$konfirmasi->links()}}
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


