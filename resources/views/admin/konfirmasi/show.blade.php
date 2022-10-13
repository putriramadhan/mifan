@extends('sb-admin/app')
@section('title', 'Konfirmasi')
@section('konfirmasi', 'active')
@section('proses', 'show')
@section('proses-active', 'active')


@section('content')


<div class="card mt-3">
  <div class="card-header">
 <h5> Detail Bukti Pembayaran </h5>
  </div>

</div>
<div class="card-body">
    <img src="/upload/bukti/{{$konfirmasi->gambar}}" height="450px"  class="mt-2" class="card-img-top" alt="...">
        <p class="card-text-left">{{$konfirmasi->deskripsi}}</p>
        <a href="/konfirmasi" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i>Kembali</a>
  </div>

@endsection
