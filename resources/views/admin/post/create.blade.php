@extends('sb-admin/app')
@section('title', 'Post')
@section('post', 'active')
@section('main', 'show')
@section('main-active', 'active')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Blog</h1>


    <form action="/post" method="POST" enctype="multipart/form-data">
       @csrf

       <div class="form-group">
           <label for="judul">Post</label>
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
        <div class="form-group">
            <label for="kategori">Kategori</label>
            <select class="form-control" id="kategori" name="kategori">
                <option selected disabled>Pilih Kategori</option>
                @foreach ($kategori as $row)
                   <option value="{{$row->id}}">{{$row->nama}}</option>
                @endforeach
           </select>
           @error('kategori')
             <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="editor">Konten</label>
            <textarea class="form-control" id="editor" rows="3" name="konten"></textarea>
            @error('konten')
             <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-info btn-sm">Simpan</button>
         <a href="/post" class="btn btn-secondary btn-sm">Kembali</a>
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
