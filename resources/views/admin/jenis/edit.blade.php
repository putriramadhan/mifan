@extends('sb-admin/app')
@section('title', 'Jenis')
@section('jenis', 'active')
@section('karcis', 'show')
@section('karcis-active', 'active')

@section('content')
  {{--flashdata--}}
  {!!session('status')!!}
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Jenis Tiket</h1>


    <form action="/jenis/{{$jenis->id}}" method="POST">
       @csrf
       @method('PATCH')

       <div class="form-group">
           <label for="nama">Edit jenis</label>
           <input type="text" class="form-control" id="nama" name="nama" value={{$jenis->nama}}>
            @error('nama')
             <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-info btn-sm">Edit</button>
         <a href="/jenis" class="btn btn-secondary btn-sm">Kembali</a>
  </form>



@endsection
