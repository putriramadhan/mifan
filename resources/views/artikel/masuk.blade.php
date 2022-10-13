@extends('artikel/template/app')
@section('title','Tiket')

@section('content')
<br/><br/><br/><br/>
<h3 class="my-2" style="color:black;"></h3><br/>
@foreach ($tiket as $index => $row)
<div class="row">
<div class="col-sm-12">
<div class="card"  style="color:black;">
  <h5 class="card-header">  </h5>
  <div class="card-body">
    <h5 class="card-title"><b>{{$row->judul}}</b></h5>
    <p class="card-text">Rp {{$row->harga}}/orang</p>
    <p class="card-text">{{$row->konten}}</p>
    @auth
    <button data-toggle="modal" data-target="#transaksiModal" class="btn btn-primary btn-sn" onclick="setModal({{$index}})">Beli</button>
    @else
    <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#loginModal" id="login-modal"
    onclick="setLogin({{$index}})">Beli</button>
    @endauth

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
                        <a data-toggle="modal" data-target="#transaksiModal" class="btn btn-success btn-sn" onclick="setModal({{$index}})">Oke</a>
                        @else
                        <a href="/login" class="btn btn-success btn-sn">Oke</a>
                        @endauth
                        </div>
                    </div>
            </div>
        </div>
    </div>

<div class="modal fade" id="transaksiModal" tabindex="-1" role="dialog" aria-labelledby="transaksiModal" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
    <div class="modal-body">
    <form action="/transaksicustomer" style="color:black;" method="post" enctype="multipart/form-data">
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
            <label for="tiket">Tiket</label>
            <select class="form-control" id="tiket" name="tiket">
                @foreach ($tiket as $row)
                   <option value="{{$row->id}}">{{$row->judul}}</option>
                @endforeach
           </select>
           @error('tiket')
             <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
           <label for="harga">Harga</label>
               <input type="text" class="form-control" id="harga" name="harga" readonly type="text">
        </div>
       <div class="form-group">
           <label for="tanggal">Tanggal</label>
               <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{old('tanggal')}}">
                 @error('tanggal')
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
           <label for="jumlah">Jumlah Tiket</label>
             <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{old('jumlah')}}">
               @error('jumlah')
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


@endsection

@section('footerscript')
<script>
    document.getElementById("demo");
    const tiket = {!! $tiket!!}
    function setModal(index){
        const data = tiket[index];
        console.log(data);
        document.getElementById("harga").value=data.harga;
        document.getElementById("tiket").value=data.id;

    }

</script>
@endsection
