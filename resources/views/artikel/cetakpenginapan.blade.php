<!DOCTYPE html>
<html>
<head>
	<title>Penginapan</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<style type="text/css">
    .card {
  width: 580px;
  border-radius: 10px;
  margin: 50px;
  background: #ADD8E6;
  overflow: hidden;
}
.card-header {
  height: 70px;
  border: 2px solid #836602;
  border-bottom: 2px dotted #836602;
  border-radius: 10px 10px 0 0;
  position: relative;
}
.card-header:before, .card-header:after {
  content: '';
  position: absolute;
  width: 24px;
  height: 24px;
  background: #fff;
  border-radius: 100%;
  bottom: -12px;
  border: 2px solid #fff;
  box-sizing: border-box;
}
.card-header:before {
  left: -13px;
}
.card-header:after {
  right: -13px;
}
.card-body {
  height: 200px;
  border: 2px solid #836602;
  border-top: none;
  border-radius: 0 0 10px 10px;
}
</style>
<body>
<div class="card">
  <div class="card-header">
  <table border="0" align="center" width="580px">
    <tr>
    <th><img src="logo.png" width="80" height="50"></th>
        <td><center>
            <font size="3"><b>Mifan Water Park</font><br>
            <font size="3">Kota Padang Panjang</font></br>
            <font size="2">Jalan St. Syahrir Telp. (0752) 484272 Padang Panjang 27118</font></br>
            </center>
        </td>
    </tr>
  </table>
</div>
<div class="card-body">
@foreach($transaksipenginapan as $row)
    <center><h5><b>{{$row->tipe->nama}}</b></h5></center>
    <table>
    <tr>
        <td> Nama Pemesan </td>
        <td>:</td>
        <td>{{$row->nama}}</td>
    </tr>
    <tr>
        <td> Tanggal Checkin </td>
        <td>:</td>
        <td>{{ Carbon\Carbon::parse($row['checkin'])->translatedformat('d F Y') }}</td>
    </tr>
    <tr>
        <td> Tanggal Checkout </td>
        <td>:</td>
        <td>{{ Carbon\Carbon::parse($row['checkout'])->translatedformat('d F Y') }}</td>
    </tr>
    <tr>
        <td> Jumlah Unit </td>
        <td>:</td>
        <td>{{$row->jumlah_unit}}</td>
    </tr>
    <tr>
        <td> Total </td>
        <td>:</td>
        <td>Rp. {{$row->total}}</td>
    </tr>
</table>
<center><h5>"LUNAS"</h5></center>
    @endforeach
</div>
</div>

</body>

</body>
</html>
