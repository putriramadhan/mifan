<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Konfirmasi Transaksi Pemesanan Tiket</title>
</head>

<style type="text/css">
    .img {
        opacity:0.4;
        filter: alpha(opacity=40);
    }
</style>
<body img src="mifan.jpg">
   @foreach($transaksi as $data)
    <p>Halo {{$data->nama}}</p>
    <p>Pengunjung yang Terhormat, terima kasih Anda telah melakukan pemesanan di Mifan Water Park</p>
    <p>Silahkan selesaikan transaksi Anda sesuai dengan informasi dibawah ini. </p>
    <br/>
    <table>
        <thread>
            <tr>
                <th>ID Transaksi</th>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Jumlah Tiket</th>
            </tr>
        </thread>
        <tbody>
            <tr>
                <td>{{$data->id}}</td>
                <td>{{$data->tiket->judul}}</td>
                <td>{{$data->tanggal}}</td>
                <td>{{$data->jumlah}}</td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td><b>Total : Rp. {{$data->total}}</b></td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
