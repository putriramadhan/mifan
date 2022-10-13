@extends('artikel/template/app')
@section('title','Penginapan')

@section('content')
<br/><br/>
<h3 class="my-4" style="color:black;"></h3><br/>
<div class="row mt-4">
    @foreach ($tipe as $index => $data)
    <div class="col-md-4">
     <div class="card h-100">
       <img src="/upload/tipe/{{$data->gambar}}" height="200px" width="300px"class="card-img-top" alt="..."></a>
     <div class="card-body">
       <h5 class="card-title"><b>{{$data->nama}}</b></h5><hr>
       <h5 class="right" style="color:orange; text-align:right;"><b>Rp. {{$data->harga}}</b></h5>
       <p><center>
       <small><i class="fas fa-door-closed" style="color:#6495ED"></i> <b>{{$data->kamar}} Kamar</b>
       <a><i class="fas fa-user" style="color:#6495ED"></i> <b>{{$data->tamu}} Tamu</b></a>
       <a><i class="fas fa-tv" style="color:#6495ED"></i><b> TV</b></a>
       <a><i class="fas fa-wifi" style="color:#6495ED"></i><b> Free WiFi</b></a><br/></small>
       </center></p>
       <small><a><b>Fasilitas Tambahan:</b></a>
       <a>{!!$data->deskripsi!!}</a></small>

        <div class="btn-group d-flex justify-content-between" role="group" aria-label="Basic example">
                @if($data->status == 1 && $data->jumlah_unit >= 1)
                    <button class="btn btn-success btn-sm">Tersedia {{$data->jumlah_unit}} Unit</button>
                    @auth
                    <button data-toggle="modal" data-target="#pesanModal" class="btn btn-primary btn-sn" onclick="setModal({{$index}})">Beli</button>
                    @else
                    <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#loginModal" id="login-modal" onclick="setLogin({{$index}})">Beli</button>
                    @endauth
                @else
                    <button class="btn btn-dark btn-sm">Tidak Tersedia</button>
                @endif
        </div>
     </div>
     </div>
 </div>
    @endforeach

    <br/><br/><br/><br/><br/><br/><br/><br/><br/>
<div class="modal" id="loginModal" tabindex="0" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <div class="modal-title">
                    <h3>Peringatan!</h3>
                </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="modal-body">
                        <b><p>Silahkan lakukan login terlebih dahulu sebelum melakukan transaksi.</p></b>
                        <div class="modal-footer">
                        @auth
                        <a data-toggle="modal" data-target="#pesanModal" class="btn btn-success btn-sn" onclick="setModal({{$index}})">Oke</a>
                        @else
                        <a href="/login" class="btn btn-success btn-sn">Oke</a>
                        @endauth

                        </div>
                    </div>
            </div>
        </div>
    </div>

<div class="modal fade" id="pesanModal" tabindex="-1" role="dialog" aria-labelledby="pesanModal" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
    <div class="modal-body">
    <form action="/transaksipenginapancustomer" style="color:black;" method="post" enctype="multipart/form-data">
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
            <label for="tipe">Tipe</label>
            <select class="form-control" id="tipe" name="tipe">
                @foreach ($tipe as $row)
                   <option value="{{$row->id}}">{{$row->nama}}</option>
                @endforeach
           </select>
           @error('tipe')
             <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
           <label for="harga_penginapan">Harga Penginapan</label>
               <input type="text" class="form-control" id="harga_penginapan" name="harga_penginapan" readonly type="text">
        </div>
       <div class="form-group">
           <label for="checkin">Tanggal Checkin</label>
               <input type="date" class="form-control" id="checkin" name="checkin" value="{{old('checkin')}}">
                 @error('checkin')
                  <p class="text-danger">{{ $message }}</p>
                 @enderror
        </div>
        <div class="form-group">
           <label for="checkout">Tanggal Checkout</label>
               <input type="date" class="form-control" id="checkout" name="checkout" value="{{old('checkout')}}">
                 @error('checkout')
                  <p class="text-danger">{{ $message }}</p>
                 @enderror
        </div>
        <div class="form-group">
           <label for="jumlah_hari">Jumlah hari</label>
             <input type="number" class="form-control" id="jumlah_hari" name="jumlah_hari" value="{{old('jumlah_hari')}}">
               @error('jumlah_hari')
                <p class="text-danger">{{ $message }}</p>
               @enderror
        </div>
        <div class="form-group">
           <label for="jumlah_unit">Jumlah Unit</label>
             <input type="number" class="form-control" id="jumlah_unit" name="jumlah_unit" value="{{old('jumlah_unit')}}">
               @error('jumlah_unit')
                <p class="text-danger">{{ $message }}</p>
               @enderror
        </div>
       <div class="form-group">
           <label for="nama">Nama</label>
               <input type="text" class="form-control" id="nama" name="nama" value="{{old('nama')}}">
                 @error('nama')
                  <p class="text-danger">{{ $message }}</p>
                 @enderror
        </div>

        <div class="form-group">
           <label for="email">Email</label>
               <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
                 @error('email')
                  <p class="text-danger">{{ $message }}</p>
                 @enderror
       </div>

        <div class="form-group">
            <label for="editor">Alamat</label>
                <textarea class="form-control" id="editor" rows="3" name="alamat"></textarea>
                 @error('alamat')
                  <p class="text-danger">{{ $message }}</p>
                 @enderror
        </div>

        <div class="form-group">
           <label for="telp">Nomor HP</label>
               <input type="text" class="form-control" id="telp" name="telp" value="{{old('telp')}}">
                 @error('telp')
                  <p class="text-danger">{{ $message }}</p>
                 @enderror
        </div>

        <div class="form-group">
           <label for="catatan">Permintaan Khusus</label>
               <textarea class="form-control" id="editor" rows="3" name="catatan"></textarea>
                 @error('catatan')
                  <p class="text-danger">{{ $message }}</p>
                 @enderror
        </div>


           <button type="submit" class="btn btn-info btn-sm">Simpan</button>
           <a href="/" class="btn btn-secondary btn-sm">Kembali</a>
  </form>
</div>
</div>
</div>
</div>

</div>

<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
@endsection

@section('footerscript')
<script>
    document.getElementById("demo");
    const tipe_penginapan = {!! $tipe!!}
    function setModal(index){
        const data = tipe_penginapan[index];
        console.log(data);
        document.getElementById("harga_penginapan").value=data.harga;
        document.getElementById("tipe").value=data.id;

    }

</script>
@endsection

