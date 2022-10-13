@extends('sb-admin/app')
@section('title', 'Transaksi Penginapan')
@section('transaksipenginapan', 'active')
@section('pemesananpenginapan', 'show')
@section('pemesananpenginapan-active', 'active')

@section('content')
<div class="card-body">
    <table>
    <tr>
        <td> Tanggal Transaksi </td>
        <td>:</td>
        <td>{{ Carbon\Carbon::parse($transaksipenginapan['created_at'])->translatedformat('d F Y') }}</td>
    </tr>
    <tr>
        <td> Jenis Penginapan </td>
        <td>:</td>
        <td>{{$transaksipenginapan->tipe->nama}}</td>
    </tr>
    <tr>
        <td> Tanggal Checkin</td>
        <td>:</td>
        <td>{{ Carbon\Carbon::parse($transaksipenginapan['checkin'])->translatedformat('d F Y') }}</td>
    </tr>
    <tr>
        <td> Tanggal Checkout</td>
        <td>:</td>
        <td>{{ Carbon\Carbon::parse($transaksipenginapan['checkout'])->translatedformat('d F Y') }}</td>
    </tr>
    <tr>
        <td> Nama Pemesan </td>
        <td>:</td>
        <td>{{$transaksipenginapan->nama}}</td>
    </tr>
    <tr>
        <td> Nomor HP </td>
        <td>:</td>
        <td>{{$transaksipenginapan->telp}}</td>
    </tr>
    <tr>
        <td> Jumlah Hari </td>
        <td>:</td>
        <td>{{$transaksipenginapan->jumlah_hari}}</td>
    </tr>
    <tr>
        <td> Jumlah Unit </td>
        <td>:</td>
        <td>{{$transaksipenginapan->jumlah_unit}}</td>
    </tr>
    <tr>
        <td> Asal Domisili </td>
        <td>:</td>
        <td>{{$transaksipenginapan->alamat}}</td>
    </tr>
    <tr>
        <td> Permintaan Khusus </td>
        <td>:</td>
        <td>{{$transaksipenginapan->catatan}}</td>
    </tr>
    <tr>
        <td> Total </td>
        <td>:</td>
        <td>Rp. {{$transaksipenginapan->total}}</td>
    </tr>
</table><br/>
<a href="/transaksipenginapan" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i>Kembali</a>
</div>

@endsection
