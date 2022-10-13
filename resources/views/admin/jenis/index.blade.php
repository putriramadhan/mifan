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

    <a href="/jenis/create" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>Tambah jenis</a>

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
    @foreach ($jenis as $row)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$row->nama}}</td>
      <td width="20%">
          <div class="btn-group" role="group" aria-label="Basic example">
              <a href="/jenis/{{$row->id}}/edit" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i>Edit</a>
              <form action="/jenis/{{$row->id}}" method="post">
                  @method('DELETE')
                  @csrf
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data?')"><i class="fas fa-trash"></i>Hapus</button>
              </form>
            </td>
    </tr>
    @endforeach
  </tbody>
</table>
{{$jenis->links()}}

@endsection
