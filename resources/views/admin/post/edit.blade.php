@extends('sb-admin/app')
@section('title', 'Post')
@section('post', 'active')
@section('main', 'show')
@section('main-active', 'active')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Blog</h1>


    <form action="/post/{{$post->id}}" method="POST" enctype="multipart/form-data">
       @csrf
       @method('PATCH')
    <div class="form-group">
           <label for="judul">Post</label>
           <input type="text" class="form-control" id="judul" name="judul" value="{{old('judul') ? old('judul') : $post->judul}}">
            @error('judul')
             <p class="text-danger">{{ $message }}</p>
            @enderror
    </div>

     <div class="row">
           <div class="col-md-2">
               <img src="/upload/post/{{$post->banner}}" width="100%" heigt="150px"  class="mt-2" alt="">
           </div>
         <div class="col-md-10">

           <div class="form-group">
           <label for="banner">Banner</label>
           <input type="file" class="form-control" id="banner" name="banner">
            @error('banner')
             <p class="text-danger">{{ $message }}</p>
            @enderror
           </div>
         </div>
     </div>
     <div class="form-group">
            <label for="kategori">Kategori</label>
            <select class="form-control" id="kategori" name="kategori">
                @foreach ($kategori as $row)
                 @if($row->id == $post->id_kategori)
                  <option selected value="{{$row->id}}">{{$row->nama}}</option>
                 @endif
                @endforeach
                @foreach ($kategori as $row)
                 @if($row->id != $post->id_kategori)
                  <option value="{{$row->id}}">{{$row->nama}}</option>
                 @endif
                @endforeach
           </select>
           @error('kategori')
             <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="editor">Konten</label>
            <textarea class="form-control" id="editor" rows="10" name="konten">{{old('konten') ? old('konten') : $post->konten}}</textarea>
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
