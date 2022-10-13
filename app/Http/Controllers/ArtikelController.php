<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Kategori;
use App\Models\Footer;
use App\Models\Post;
use App\Models\Slider;
use App\Models\Logo;
use App\Models\Jenis;
use App\Models\Tiket;
use App\Models\Transaksi;
use App\Models\Konfirmasi;
use App\Models\User;
use App\Models\Tipe;
use App\Models\TransaksiPenginapan;
use App\Models\Rekening;
use Illuminate\Http\Request;
use PDF;

class ArtikelController extends Controller
{
    public function __construct()
    {
        $this->footer = Footer::select('konten')->first();
    }

    public function index()
    {
        $footer = $this->footer;
        $logo = Logo::select('gambar')->first();
        $slider = Slider::select('slug','banner','judul')->get();
        $artikel = Post::select('banner','judul','slug','created_at')->latest()->get();
        $kategori = Kategori::select('slug','nama')->orderBy('nama','asc')->get();
        $jenis = Jenis::select('slug','nama')->orderBy('nama','asc')->get();
        $tipe = Tipe::select('id', 'nama','gambar','deskripsi','harga','slug','status','id_jenis','tamu')->get();
        return view('artikel/index',compact('artikel','kategori','slider','logo','footer','jenis','tipe'));
    }

    public function artikel($slug)
    {
        $footer = $this->footer;
        $logo = Logo::select('gambar')->first();
        $artikel = Post::select('id','judul','konten','id_kategori','created_at','banner')->where('slug', $slug)->firstOrFail();
        $kategori = Kategori::select('slug','nama')->orderBy('nama','asc')->get();
        $jenis = Jenis::select('slug','nama')->orderBy('nama','asc')->get();
        $tipe = Tipe::select('id', 'nama','gambar','deskripsi','harga','slug','status','id_jenis','tamu')->get();
        return view('artikel/artikel',compact('artikel','kategori','logo','footer','jenis','tipe'));


    }

    public function kategori($slug)
    {
        $footer = $this->footer;
        $logo = Logo::select('gambar')->first();
        $slider = Slider::select('slug','banner','judul')->latest()->get();
        $kategori = Kategori::select('id')->where('slug',$slug)->firstOrFail();
        $artikel = Post::select('banner','judul','slug','created_at')->where('id_kategori',$kategori->id)->latest()->get();
        $kategori = Kategori::select('slug','nama')->orderBy('nama','asc')->get();
        $jenis = Jenis::select('slug','nama')->orderBy('nama','asc')->get();
        $tipe = Tipe::select('id', 'nama','gambar','deskripsi','harga','slug','status','id_jenis','tamu')->get();

        return view('artikel/index',compact('artikel','kategori','logo','slider','footer','jenis','tipe'));
    }

    public function jenis($slug)
    {
        $footer = $this->footer;
        $logo = Logo::select('gambar')->first();
        $slider = Slider::select('slug','banner','judul')->latest()->get();
        $jenis = Jenis::select('id')->where('slug',$slug)->firstOrFail();
        $tiket = Tiket::select('id','judul','konten','harga','slug')->where('id_jenis',$jenis->id)->latest()->get();
        $jenis = Jenis::select('slug','nama')->orderBy('nama','asc')->get();
        $artikel = Post::select('banner','judul','slug','created_at')->get();
        $kategori = Kategori::select('slug','nama')->get();
        $transaksi = Transaksi::select('id','tanggal','nama','jumlah','email','telp','total','slug','alamat','id_tiket','harga_tiket','id_user')->get();
        $user = User::select('name','id')->get();
        $tipe = Tipe::select('id', 'nama','gambar','deskripsi','harga','slug','status','id_jenis','jumlah_unit','kamar','tamu')->latest()->get();

        $view = $slug=='penginapan' ? 'artikel/penginapan' : 'artikel/masuk';
        return view($view,compact('jenis','logo','slider','footer','tiket','artikel','kategori','transaksi','user','tipe'));
    }

    public function detail()
    {
        $footer = $this->footer;
        $logo = Logo::select('gambar')->first();
        $slider = Slider::select('slug','banner','judul')->latest()->get();
        $artikel = Post::select('banner','judul','slug','created_at')->latest()->get();
        $jenis = Jenis::select('id')->first();
        $kategori = Kategori::select('slug','nama')->orderBy('nama','asc')->get();
        $tiket = Tiket::select('id','judul','konten','harga','slug')->where('id_jenis',$jenis->id)->latest()->get();
        $jenis = Jenis::select('slug','nama')->orderBy('nama','asc')->get();
        $transaksi = Transaksi::select('id','tanggal','nama','jumlah','email','telp','total','slug','alamat','id_tiket',
        'harga_tiket','id_user','status')->where('id_user',Auth::id())->latest()->get();
        $user = User::select('name','id')->get();
        $tipe = Tipe::select('id', 'nama','gambar','deskripsi','harga','slug','status','id_jenis','jumlah_unit','kamar','tamu')->get();
        $rekening = Rekening::select('id','bank','nama_akun','nomor_rekening','deskripsi','gambar')->get();

        return view('admin/konfirmasi/detail',compact('jenis','logo','slider','footer','tiket','artikel','kategori','transaksi','user','tipe','rekening'));
    }


    public function detailpenginapan()
    {
        $footer = $this->footer;
        $logo = Logo::select('gambar')->first();
        $slider = Slider::select('slug','banner','judul')->latest()->get();
        $artikel = Post::select('banner','judul','slug','created_at')->latest()->get();
        $jenis = Jenis::select('id')->first();
        $kategori = Kategori::select('slug','nama')->orderBy('nama','asc')->get();
        $tiket = Tiket::select('id','judul','konten','harga','slug')->where('id_jenis',$jenis->id)->latest()->get();
        $jenis = Jenis::select('slug','nama')->orderBy('nama','asc')->get();
        $user = User::select('name','id')->get();
        $tipe = Tipe::select('id', 'nama','gambar','deskripsi','harga','slug','status','id_jenis','jumlah_unit','kamar','tamu')->get();
        $transaksipenginapan = TransaksiPenginapan::select('id','checkin','jumlah_hari','checkout','nama','alamat','email','telp','total','catatan','slug','id_tipe','harga_penginapan','id_user','status','nama','jumlah_unit')->where('id_user',Auth::id())->latest()->get();
        $rekening = Rekening::select('id','bank','nama_akun','nomor_rekening','deskripsi','gambar')->get();

        return view('admin/konfirmasipenginapan/detailpenginapan',compact('jenis','logo','slider','footer','tiket','artikel','kategori','user','tipe','transaksipenginapan','rekening'));
    }


}
