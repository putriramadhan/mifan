@extends('sb-admin/app')
@section('title', 'Slider')
@section('slider', 'active')
@section('main', 'show')
@section('main-active', 'active')

@section('content')


<div class="card mt-3">
  <div class="card-header">
 <h5> {{$slider->judul}} </h5>
  </div>
</div>
<div class="card-body">
    <img src="/upload/slider/{{$slider->banner}}" height="450px"  class="mt-2" class="card-img-top" alt="...">
        <p class="card-text-left"><small class="text-muted">{{$slider->created_at->diffForHumans()}}</small></p>
        <a href="/slider/{{$slider->id}}/edit" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i>Edit</a>
        <a href="/slider" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i>Kembali</a>
  </div>

@endsection
