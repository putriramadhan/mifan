@extends('sb-admin/app')
@section('title','Logo')
@section('logo', 'active')
@section('pengaturan', 'show')
@section('pengaturan-active', 'active')

@section('content')
{{--flashdata--}}
  {!!session('status')!!}
<!--Page Heading-->
   <h1 class="h3 mb-4 text-gray-800">Daftar Logo</h1>

   <form action="/logo/{{$logo->id}}" method="POST" enctype="multipart/form-data">
       <img src="/upload/logo/{{$logo->gambar}}" alt="" width="150px" height="100px">
  </form>

  <a href="/logo/{{$logo->id}}/edit" class="btn btn-primary btn-sm " ><i class="fas fa-edit"></i>Edit logo</a>

@endsection
