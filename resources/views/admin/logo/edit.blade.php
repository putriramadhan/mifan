
@extends('sb-admin/app')
@section('title','Logo')
@section('logo', 'active')
@section('pengaturan', 'show')
@section('pengaturan-active', 'active')

@section('content')
<!--Page Heading-->

   <h1 class="h3 mb-4 text-gray-800">Logo</h1>

   <form action="/logo/{{$logo->id}}" method="POST" enctype="multipart/form-data">
       @csrf
       @method('PATCH')

       <img src="/upload/logo/{{$logo->gambar}}" alt="" width="150px" height="100px">
        <div class="form-group">
            <label for="logo">Gambar</label>
            <input type="file" class="form-control" id="logo" name="logo">
            @error('logo')
             <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-info btn-sm">Simpan</button>
         <a href="/logo" class="btn btn-secondary btn-sm">Kembali</a>
  </form>
@endsection
