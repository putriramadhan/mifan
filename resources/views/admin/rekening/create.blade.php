@extends('sb-admin/app')
@section('title','Rekening')
@section('rekening', 'active')
@section('pengaturan', 'show')
@section('pengaturan-active', 'active')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Rekening</h1>


    <form action="/rekening" method="POST" enctype="multipart/form-data">
       @csrf

       <div class="form-group">
           <label for="bank">Nama Bank</label>
           <input type="text" class="form-control" id="bank" name="bank" value="{{old('bank')}}">
            @error('bank')
             <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
           <label for="gambar">Gambar</label>
           <input type="file" class="form-control" id="gambar" name="gambar">
            @error('gambar')
             <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
           <label for="nama_akun">Nama Pemilik Akun</label>
           <input type="text" class="form-control" id="nama_akun" name="nama_akun" value="{{old('nama_akun')}}">
            @error('nama_akun')
             <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
           <label for="nomor_rekening">Nomor Rekening</label>
           <input type="text" class="form-control" id="nomor_rekening" name="nomor_rekening" value="{{old('nomor_rekening')}}">
            @error('nomor_rekening')
             <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="editor">Deskripsi</label>
            <textarea class="form-control" id="editor" rows="3" name="deskripsi"></textarea>
            @error('deskripsi')
             <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-info btn-sm">Simpan</button>
         <a href="/rekening" class="btn btn-secondary btn-sm">Kembali</a>
  </form>
@endsection

@section('ck-editor')
<script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>

<script>
ClassicEditor
    .create( document.querySelector( '#editor' ) )
    .catch( error => {
        console.error( error );
    } );
</script>
@endsection
