@extends('sb-admin/app')
@section('title', 'konfirmasipenginapan')
@section('konfirmasipenginapan', 'active')
@section('prosespenginapan', 'show')
@section('prosespenginapan-active', 'active')


@section('content')


<div class="card mt-3">
  <div class="card-header">
 <h5> Detail Bukti Pembayaran </h5>
  </div>

</div>
<div class="card-body">
    <img src="/upload/buktipenginapan/{{$konfirmasipenginapan->gambar}}" height="450px"  class="mt-2" class="card-img-top" alt="...">
        <p class="card-text-left">{{$konfirmasipenginapan->deskripsi}}</p>
        <a href="/konfirmasipenginapan" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i>Kembali</a>
  </div>

@endsection
