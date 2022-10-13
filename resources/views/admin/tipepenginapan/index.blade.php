@extends('sb-admin/app')
@section('title', 'tipe')
@section('pemesananpenginapan', 'active')
@section('transaksipenginapan', 'show')
@section('transaksipenginapan-active', 'active')

@section('content')
  {{--flashdata--}}
  {!!session('status')!!}
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tipe Penginapan</h1>

    <a href="/tipe/create" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>Tambah Tipe</a>
    @if($tipe[0])
    {{--table--}}
    <table class="table mt-4 table-hover table-bordered">
    <thead>
    <tr>
      <th scope="col" width="8%">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Gambar</th>
      <th scope="col">Harga</th>
      <th scope="col">Jumlah Kamar</th>
      <th scope="col">Jumlah Tamu</th>
      <th scope="col">Fasilitas Kamar</th>
      <th scope="col">Jumlah Unit</th>
      <th scope="col">Status</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($tipe as $row)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$row->nama}}</td>
      <td><img src="/upload/tipe/{{$row->gambar}}" alt="" width="80px" height="80px"></td>
      <td>{{$row->harga}}</td>
      <td>{{$row->kamar}}</td>
      <td>{{$row->tamu}}</td>
      <td>{!!$row->deskripsi!!}</td>
      <td>{{$row->jumlah_unit}} unit</td>
      <td>
        <div class="btn-group" role="group" aria-label="Basic example">
                @if($row->status == 1)
                    <button class="btn btn-success btn-sm">Tersedia</button>
                @else
                    <button class="btn btn-dark btn-sm">Tidak Tersedia</button>
                @endif
        </div>
       </td>
      <td width="20%">
           <div class="btn-group" role="group" aria-label="Basic example">
              <a href="/tipe/{{$row->id}}/edit" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i>Edit</a>
              <form action="/tipe/{{$row->id}}" method="post">
                  @method('DELETE')
                  @csrf
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data?')"><i class="fas fa-trash"></i>Hapus</button>
              </form>
            </div>
            </td>
    </tr>
    @endforeach
  </tbody>
</table>
{{$tipe->links()}}

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

@section('search-url', '/tipe/search')
@section('search')
  @include('sb-admin/search')
@endsection
