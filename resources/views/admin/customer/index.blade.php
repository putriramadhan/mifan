@extends('sb-admin/app')
@section('title', 'customer')
@section('customer', 'active')
@section('user', 'show')
@section('user-active', 'active')

@section('content')
  {{--flashdata--}}
  {!!session('status')!!}
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Customer</h1>

    {{--table--}}
    <table class="table mt-4 table-hover table-bordered">
    <thead>
    <tr>
      <th scope="col" width="8%">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Email</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($customer as $row)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$row->name}}</td>
      <td>{{$row->email}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
{{$customer->links()}}

@endsection
