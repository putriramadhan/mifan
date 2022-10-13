@extends('artikel/template/app')
@section('title','Mifan Water Park')
@section('home','active')

@section('content')

<div id="demo" class="carousel slide" data-ride="carousel">
<ul class="carousel-indicators">
    @foreach ($slider as $row)
      <li data-target="#demo" data-slide-to="{{$loop->index}}" class="{{($loop->first) ? 'active' : ''}}"></li>
    @endforeach
</ul>
  <div class="carousel-inner">
  @foreach ($slider as $row)
      <div class="carousel-item {{($loop->first) ? 'active' : ''}}">
      <img src="/upload/slider/{{$row->banner}}" height="60%" width="80%" class="d-block w-100" alt="...">
       <div class="carousel-caption">
        <h5 style="color:black;"><b>{{$row->judul}}</b></h5>
       </div>
      </div>
    @endforeach

  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon" ></span>
</a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
    <span class="sr-only"></span>
</a>
</div>
<h2 class="my-4 text-center"><b>@yield('title')</b></h2>
 <div class="row mt-4">
    @foreach ($artikel as $row)
    <div class="col-md-4">
     <div class="card h-100">
       <a href="/{{$row->slug}}"><img src="/upload/post/{{$row->banner}}" height="200px" width="300px"class="card-img-top" alt="..."></a>
     <div class="card-body">
       <h5 class="card-title">{{$row->judul}}</h5>
        <p class="card-text">{{$row->konten}}</p>
        <p class="card-text"><small class="text-muted">{{$row->created_at->diffForHumans()}}</small></p>

     </div>
     </div>
 </div>
    @endforeach
</div>



@endsection
