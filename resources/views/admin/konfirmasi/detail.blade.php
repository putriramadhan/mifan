@extends('artikel/template/app')
@section('title','Riwayat Transaksi Tiket Masuk')

@section('content')
<br/><br/><br/><br/>
<div class="card w-125" style="color:black;">
  <div class="card-body" >
  {{--flashdata--}}
    {!!session('status')!!}
  <h3><b>Riwayat Transaksi Tiket Masuk</b></h3><br/>
    @if($transaksi->count() >= 1)

    @foreach($transaksi as $data)
    <tr>
        <td> Nama Pemesan :</td>
        <td>{{$data->nama}}</td>
    </tr>
    <div class="box-body">
      <table class="table">
       <tr style="color:gray;">
        <th width="15%">Tiket</th>
        <th width="20%">Tanggal Yang Dipilih</th>
        <th width="10%">Jumlah Tiket</th>
        <th width="25%"><center>Status</center></th>
       </tr>
      <tr>
      <td style="font-size: medium"><b>{{$data->tiket->judul}}</b></td>
        <td style="font-size: medium"><b>{{ Carbon\Carbon::parse($data['tanggal'])->translatedformat('d F Y') }}</b></td>
        <td style="font-size: medium"><b>{{$data->jumlah}}</b></td>
      <td>
        <center>
        @if($data->status == '1')
        <a class="btn btn-primary" data-toggle="modal" data-target="#rekeningModal">Bayar Sekarang</a><br/><br/>
        @elseif($data->status == '2')
           <a class="btn btn-warning btn-sn">Menunggu Konfirmasi</a><br/><br/>
        @elseif($data->status == '3')
           <a href="/cetaktiketmasuk/{{$data->id}}" class="btn btn-success btn-sn" target="_blank"><i class="fas fa-print"></i>Download Tiket</a><br/><br/>
        @else
        <a class="btn btn-danger btn-sn" href="https://wa.me/6285322224132">Ditolak, Harap segera menghubungi Admin </br><i class="fab fa-whatsapp"></i> 0853 2222 4132</a><br/><br/>
        @endif
      </center>
    </td>
   </tr>
   <tr class="btn-dark">
        <td colspan="3" align="center"><h5><b>Total</b><h5></td>
        <td align="center"><h5><b>Rp. {{$data->total}}</b></h5></td>
   </tr>
   </table>
</div>
</br></br></br>
</div>
   @foreach($rekening as $data2)
     <div class="modal" id="rekeningModal" tabindex="0" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <div class="modal-title">
                    <h3>Info Pembayaran</h3>
                </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="modal-body">
                        <p style="color:grey;">Silahkan melakukan pembayaran sebelum 1x24 Jam dari waktu pemesanan!
                        </p>
                       <center>
                        <img src="/upload/rekening/{{$data2->gambar}}" alt="" width="120px" height="40px">
                        </br><h5>{{$data2->nama_akun}}</h5>
                        <h5>{{$data2->nomor_rekening}}</h5>
                      </center>
                        <b><p>{!!$data2->deskripsi!!}</p></b>
                        <div class="modal-footer">
                        <a data-toggle="modal" data-target="#buktiModal{{$data->id}}" class="btn btn-success btn-sn">Oke</a>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    @endforeach



<div class="modal fade" id="buktiModal{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="buktiModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content"><b>
            <div class="modal-header">
            <div class="modal-title">
               <h3>Bukti Pembayaran</h3>
            </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form action="/konfirmasi/store" style="color:black;" method="post" enctype="multipart/form-data">
                @csrf
                 @if(count($errors)>0)
                 <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                          <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="form-group">
                    <label for="text">Total Pembayaran</label>
                    <b><h3 style="color:blue">Rp. {{$data->total}}</h3></b>
                    <a style="color:green;">Bayar Pesanan sesuai jumlah diatas</a>
                </div>
                <div class="form-group">
                    <label for="text">Nomor pembayaran</label>
                    <input type="text" class="form-control" id="transaksi" name="transaksi" value="{{$data->id}}" readonly>
                    @error('gambar')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="gambar">Masukkan Bukti Pembayaran</label>
                    <input type="file" class="form-control" id="gambar" name="gambar">
                    @error('gambar')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="editor">Catatan</label>
                    <textarea class="form-control" id="editor" rows="2" name="deskripsi"></textarea>
                    @error('deskripsi')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-info btn-sn">Simpan</button>
                    <a href="/detail" class="btn btn-secondary btn-sn">Kembali</a>
                </div>
            </form>
</b></div>
    </div>
</div>
</div>
@endforeach
@else
     <div class="alert alert-danger" role="alert"> Anda belum memesan tiket!
     </div>
@endif
</div>
</div>


<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>


@endsection
