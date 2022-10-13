@extends('sb-admin/app')
@section('title', 'Post')
@section('post', 'active')
@section('main', 'show')
@section('main-active', 'active')

@section('content')


<div class="card mt-3">
  <div class="card-header">
 <h5> {{$post->judul}} </h5>
  </div>
</div>
<div class="card-body">
    <img src="/upload/post/{{$post->banner}}" height="450px"  class="mt-2" class="card-img-top" alt="...">
        <p class="card-text-left">{!!$post->konten!!}</p>
        <p class="card-text-left"><small class="text-muted">{{$post->created_at->diffForHumans()}}</small></p>
        <a href="/post/{{$post->id}}/edit" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i>Edit</a>
        <a href="/post" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i>Kembali</a>
  </div>

@endsection
