@extends('sb-admin/app')
@section('title', 'Tiket')
@section('tiket', 'active')
@section('transaksi', 'show')
@section('transaksi-active', 'active')

@section('content')
  {{--flashdata--}}
  {!!session('status')!!}
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tiket Masuk</h1>

    <a href="/tiket/create" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>Tambah tiket</a>

    {{--table--}}
    <table class="table mt-4 table-hover table-bordered">
    <thead>
    <tr>
      <th scope="col" width="8%">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Deskripsi</th>
      <th scope="col">Harga</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($tiket as $row)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$row->judul}}</td>
      <td>{{$row->konten}}</td>
      <td>Rp{{$row->harga}}</td>
      <td width="20%">
          <div class="btn-group" role="group" aria-label="Basic example">
              <a href="/tiket/{{$row->id}}/edit" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i>Edit</a>
              <form action="/tiket/{{$row->id}}" method="post">
                  @method('DELETE')
                  @csrf
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data?')"><i class="fas fa-trash"></i>Hapus</button>
              </form>
            </td>
    </tr>
    @endforeach
  </tbody>
</table>
{{$tiket->links()}}

@endsection
