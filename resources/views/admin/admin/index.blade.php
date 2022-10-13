@extends('sb-admin/app')
@section('title', 'Admin')
@section('admin', 'active')
@section('user', 'show')
@section('user-active', 'active')

@section('content')
  {{--flashdata--}}
  {!!session('status')!!}
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Admin</h1>

    <a href="/admin/create" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>Tambah Admin</a>

    {{--table--}}
    <table class="table mt-4 table-hover table-bordered">
    <thead>
    <tr>
      <th scope="col" width="8%">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Email</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($admin as $row)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$row->name}}</td>
      <td>{{$row->email}}</td>
      <td width="20%">
          <div class="btn-group" role="group" aria-label="Basic example">
              <form action="/admin/{{$row->id}}" method="post">
                  @method('DELETE')
                  @csrf
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data?')"><i class="fas fa-trash"></i>Hapus</button>
              </form>
            </td>
    </tr>
    @endforeach
  </tbody>
</table>
{{$admin->links()}}

@endsection
