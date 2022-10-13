@extends('sb-admin/app')
@section('title', 'Slider')
@section('slider', 'active')
@section('main', 'show')
@section('main-active', 'active')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Banner</h1>


    <form action="/slider" method="post" enctype="multipart/form-data">
       @csrf

       <div class="form-group">
           <label for="judul">Judul</label>
           <input type="text" class="form-control" id="judul" name="judul" value="{{old('judul')}}">
            @error('judul')
             <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
           <label for="banner">Banner</label>
           <input type="file" class="form-control" id="banner" name="banner">
            @error('banner')
             <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-info btn-sm">Simpan</button>
         <a href="/slider" class="btn btn-secondary btn-sm">Kembali</a>
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
