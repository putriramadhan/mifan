@extends('sb-admin/app')
@section('title', 'Slider')
@section('slider', 'active')
@section('main', 'show')
@section('main-active', 'active')

@section('content')
  {{--flashdata--}}
  {!!session('status')!!}
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Slider</h1>

    <a href="/slider/create" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>Tambah slider</a>

    @if($slider[0])
    {{--table--}}
    <table class="table mt-4 table-hover table-bordered">
    <thead>
    <tr>
      <th scope="col" width="8%">No</th>
      <th scope="col">Judul</th>
      <th scope="col">Banner</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($slider as $row)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$row->judul}}</td>
      <td><img src="/upload/slider/{{$row->banner}}" alt="" width="80px" height="80px"></td>
      <td width="20%">
          <div class="btn-group" role="group" aria-label="Basic example">
              <a href ="/slider/{{$row->id}}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i>Detail</a>
              <a href="/slider/{{$row->id}}/edit" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i>Edit</a>
              <form action="/slider/{{$row->id}}" method="post">
                  @method('DELETE')
                  @csrf
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data?')"><i class="fas fa-trash"></i>Hapus</button>
              </form>
            </td>
    </tr>
    @endforeach
  </tbody>
</table>
{{$slider->links()}}
@else
       <div class="alert alert-danger mt-4" role="alert">
        Anda belum mempunyai data
       </div>
@endif
@endsection

