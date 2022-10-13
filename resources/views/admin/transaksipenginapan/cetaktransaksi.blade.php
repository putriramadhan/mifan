<!DOCTYPE html>
<html>
<head>
	<title>Laporan Data Transaksi Penginapan</title>
</head>
<style type="text/css">

    .tandatangan{

     text-align:center; margin-left:900px;

   }
    .tandatangan{

     text-align:center; margin-left:700px;

   }
</style>
<body>
<table border="0" align="center" width="700px">
    <tr>
        <th><img src="mifan.jpg" width="120" height="70"></th>
        <td>
            <center>
            <font size="5"><b>Mifan Water Park</font><br>
            <font size="5">Kota Padang Panjang</font></br>
            <font size="4">Sumatera Barat</font></br>
            <a style="font-size: small">Jalan St. Syahrir Telp. (0752) 484272 Padang Panjang 27118</b>
            </center>
        </td>
    </tr>
    <tr>
        <td colspan="2"><hr></td>
    </tr>
</table>
</br>

		<center>
			<h2>Laporan Data Transaksi Penginapan</h2>
		</center>
<table border="1" align="center">
<tr style="background-color: grey;">
      <th>No</th>
      <th>Jenis Penginapan</th>
      <th>Tanggal Checkin</th>
      <th>Tanggal Checkout</th>
      <th>Nama</th>
      <th>Email</th>
      <th>No HP</th>
      <th>Jumlah Hari</th>
      <th>Jumlah Unit</th>
      <th>Asal domisili</th>
      <th>Total</th>
    </tr>
    @foreach ($transaksipenginapan as $row)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$row->tipe->nama}}</td>
      <td>{{ Carbon\Carbon::parse($row['checkin'])->translatedformat('d F Y') }}</td>
      <td>{{ Carbon\Carbon::parse($row['checkout'])->translatedformat('d F Y') }}</td>
      <td>{{$row->nama}}</td>
      <td>{{$row->email}}</td>
      <td>{{$row->telp}}</td>
      <td>{{$row->jumlah_hari}} Malam</td>
      <td>{{$row->jumlah_unit}}</td>
      <td>{{$row->alamat}}</td>
      <td>Rp{{$row->total}}</td>
    </tr>
    @endforeach
</table>

<div class="tandatangan" >

      <br/>

      <b>Padang Panjang, <?php echo Carbon\Carbon::parse()->translatedFormat(' d / F / y'); ?></b>

      <p>Direktur Utama</p>
      <br/><br/>

      <hr  width="200px"/>
      <p>Desrial efendi</p>

    </div>
</body>
</html>
