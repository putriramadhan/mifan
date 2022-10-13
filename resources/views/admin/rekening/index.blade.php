@extends('sb-admin/app')
@section('title','Rekening')
@section('rekening', 'active')
@section('pengaturan', 'show')
@section('pengaturan-active', 'active')

@section('content')
{{--flashdata--}}
  {!!session('status')!!}

 <!-- Page Heading -->
 <h1 class="h3 mb-4 text-gray-800">Rekening</h1>

<a href="/rekening/create" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>Tambah Rekening</a>

@if($rekening[0])
{{--table--}}
<table class="table mt-4 table-hover table-bordered">
<thead>
<tr>
  <th scope="col" width="8%">No</th>
  <th scope="col">Bank</th>
  <th scope="col">Gambar</th>
  <th scope="col">Nama Akun</th>
  <th scope="col">Nomor Rekening</th>
  <th scope="col">Deskripsi</th>
  <th scope="col">Aksi</th>
</tr>
</thead>
<tbody>
@foreach ($rekening as $row)
<tr>
  <th scope="row">{{$loop->iteration}}</th>
  <td>{{$row->bank}}</td>
  <td><img src="/upload/rekening/{{$row->gambar}}" alt="" width="80px" height="80px"></td>
  <td>{{$row->nama_akun}}</td>
  <td>{{$row->nomor_rekening}}</td>
  <td>{!!$row->deskripsi!!}</td>
  <td width="20%">
      <div class="btn-group" role="group" aria-label="Basic example">
          <a href="/rekening/{{$row->id}}/edit" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i>Edit</a>
          <form action="/rekening/{{$row->id}}" method="rekening">
              @method('DELETE')
              @csrf
            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data?')"><i class="fas fa-trash"></i>Hapus</button>
          </form>
        </td>
</tr>
@endforeach
</tbody>
</table>
{{$rekening->links()}}

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
