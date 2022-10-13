@extends('sb-admin/app')
@section('title', 'tiket')
@section('tiket', 'active')
@section('transaksi', 'show')
@section('transaksi-active', 'active')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tiket Masuk</h1>


    <form action="/tiket/{{$tiket->id}}" method="POST" enctype="multipart/form-data">
       @csrf
       @method('PATCH')

       <div class="form-group">
            <label for="jenis">Jenis Tiket</label>
            <select class="form-control" id="jenis" name="jenis">
                <option selected disabled>Pilih Tiket</option>
                @foreach ($jenis as $row)
                   <option value="{{$row->id}}">{{$row->nama}}</option>
                @endforeach
           </select>
           @error('jenis')
             <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
       <div class="form-group">
           <label for="judul">Nama</label>
           <input type="text" class="form-control" id="judul" name="judul" value="{{old('judul') ? old('judul') : $tiket->judul}}">
            @error('judul')
             <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
           <label for="harga">Harga</label>
           <input type="text" class="form-control" id="harga" name="harga" value="{{old('harga') ? old('harga') : $tiket->harga}}">
            @error('harga')
             <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="konten">Konten</label>
            <textarea class="form-control" id="konten" rows="3" name="konten">{{old('konten') ? old('konten') : $tiket->konten}}</textarea>
            @error('konten')
             <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-info btn-sm">Simpan</button>
         <a href="/tiket" class="btn btn-secondary btn-sm">Kembali</a>
  </form>
@endsection
