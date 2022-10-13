@extends('artikel/template/app')
@section('title','Artikel')

@section('content')
<div class="col-mt-4">
  <img src="/upload/post/{{$artikel->banner}}" width="100%" class="img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">{{$artikel->judul}}</h5>
    <small class="card-text">
      <span class="text-muted"><a href="/artikel-kategori/{{$artikel->kategori->slug}}">{{$artikel->kategori->nama}}</a></span>
      .
      <span class="text-muted">{{$artikel->created_at->diffForHumans()}}</span>
   </small>
   <p class="card-text">{!!$artikel->konten!!}</p>
  </div>
</div>

@endsection

