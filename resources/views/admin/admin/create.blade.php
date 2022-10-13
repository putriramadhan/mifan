@extends('sb-admin/app')
@section('title', 'admin')
@section('admin', 'active')
@section('user', 'show')
@section('user-active', 'active')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Admin</h1>


    <form action="/admin" method="post" enctype="multipart/form-data">
       @csrf

       <div class="form-group">
           <label for="name">Nama Admin</label>
           <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
            @error('name')
             <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
           <label for="email">Email</label>
           <input type="email" class="form-control" id="email" name="email">
            @error('email')
             <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
            @error('password')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
           <label for="password_confirmation">Ulangi Password</label>
           <input type="text" class="form-control" id="password" name="password_confirmation">
            @error('password')
             <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-info btn-sm">Simpan</button>
         <a href="/admin" class="btn btn-secondary btn-sm">Kembali</a>
  </form>
@endsection

