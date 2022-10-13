@extends('sb-admin/app')
@section('title', 'Kategori')
@section('kategori', 'active')
@section('main', 'show')
@section('main-active', 'active')

@section('content')
  {{--flashdata--}}
  {!!session('status')!!}
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Kategori</h1>

    <a href="/kategori/create" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>Tambah Kategori</a>

    @if($kategori[0])
    {{--table--}}
    <table class="table mt-4 table-hover table-bordered">
    <thead>
    <tr>
      <th scope="col" width="8%">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($kategori as $row)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$row->nama}}</td>
      <td width="20%">
          <div class="btn-group" role="group" aria-label="Basic example">
              <a href="/kategori/{{$row->id}}/edit" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i>Edit</a>
              <form action="/kategori/{{$row->id}}" method="post">
                  @method('DELETE')
                  @csrf
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data?')"><i class="fas fa-trash"></i>Hapus</button>
              </form>
            </td>
    </tr>
    @endforeach
  </tbody>
</table>
{{$kategori->links()}}

@else
 @if (session('search'))
     {!!session('search')!!}
     @else
       <div class="alert alert-danger mt-4" role="alert">
        Anda belum mempunyai data
       </div>
 @endif
@endif

@endsection
@section('search-url', '/kategori/search')
@section('search')
  @include('sb-admin/search')
@endsection
