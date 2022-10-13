@extends('sb-admin/app')
@section('title', 'Jenis')
@section('jenis', 'active')
@section('karcis', 'show')
@section('karcis-active', 'active')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Jenis Tiket</h1>


    <form action="/jenis" method="POST">
       @csrf

       <div class="form-group">
           <label for="nama">Jenis</label>
           <input type="text" class="form-control" id="nama" name="nama">
            @error('nama')
             <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-info btn-sm">Simpan</button>
         <a href="/jenis" class="btn btn-secondary btn-sm">Kembali</a>
  </form>



@endsection
