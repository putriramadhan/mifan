@extends('sb-admin/app')
@section('title', 'tipe')
@section('tipe', 'active')
@section('karcis', 'show')
@section('karcis-active', 'active')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tipe Penginapan</h1>


    <form action="/tipe/{{$tipe->id}}" method="POST" enctype="multipart/form-data">
       @csrf
       @method('PATCH')

       <div class="form-group">
            <label for="jenis">Jenis Tiket</label>
            <select class="form-control" id="jenis" name="jenis">
                <option selected disabled>Pilih Tiket</option>
                @foreach ($jenis as $row)
                   <option value="{{$row->id}}">{{$row->nama}}</option>
                @endforeach
           </select>
           @error('jenis')
             <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
       <div class="form-group">
           <label for="nama">Nama</label>
           <input type="text" class="form-control" id="nama" name="nama" value="{{old('nama') ? old('nama') : $tipe->nama}}">
            @error('nama')
             <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="row">
           <div class="col-md-2">
               <img src="/upload/tipe/{{$tipe->gambar}}" width="100%" heigt="150px"  class="mt-2" alt="">
           </div>
         <div class="col-md-10">

           <div class="form-group">
           <label for="gambar">Gambar</label>
           <input type="file" class="form-control" id="gambar" name="gambar">
            @error('gambar')
             <p class="text-danger">{{ $message }}</p>
            @enderror
           </div>
         </div>
     </div>
     <div class="form-group">
           <label for="harga">Harga</label>
           <input type="text" class="form-control" id="harga" name="harga" value="{{old('harga') ? old('harga') : $tipe->harga}}">
            @error('harga')
             <p class="text-danger">{{ $message }}</p>
            @enderror
    </div>
    <div class="form-group">
           <label for="tamu">Tamu</label>
           <input type="text" class="form-control" id="tamu" name="tamu" value="{{old('tamu') ? old('tamu') : $tipe->tamu}}">
            @error('tamu')
             <p class="text-danger">{{ $message }}</p>
            @enderror
    </div>
     <div class="form-group">
           <label for="kamar">Jumlah Kamar</label>
             <input type="number" class="form-control" id="kamar" name="kamar" value="{{old('kamar')}}">
               @error('kamar')
                <p class="text-danger">{{ $message }}</p>
               @enderror
        </div>
        <div class="form-group">
            <label for="editor">Fasilitas Kamar</label>
            <textarea class="form-control" id="editor" rows="3" name="deskripsi">{{old('deskripsi') ? old('deskripsi') : $tipe->deskripsi}}</textarea>
            @error('deskripsi')
             <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
           <label for="jumlah_unit">Jumlah Unit</label>
             <input type="number" class="form-control" id="jumlah_unit" name="jumlah_unit" value="{{old('jumlah_unit')}}">
               @error('jumlah_unit')
                <p class="text-danger">{{ $message }}</p>
               @enderror
        </div>

        <div class="form-group">
           <label for="status">Status</label>
           <select class="form-control" id="status" name="status">
            <option value='1'>Tersedia</option>
            <option value='2'>Tidak Tersedia</option>
           </select>
            @error('status')
             <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>


        <button type="submit" class="btn btn-info btn-sm">Simpan</button>
         <a href="/tipe" class="btn btn-secondary btn-sm">Kembali</a>
  </form>

</br></br>
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
