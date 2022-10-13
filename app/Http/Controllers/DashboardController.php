<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Footer;
use App\Models\Post;
use App\Models\Jenis;
use App\Models\Tiket;
use App\Models\Transaksi;
use App\Models\Konfirmasi;
use App\Models\Tipe;
use App\Models\TransaksiPenginapan;
use App\Models\KonfirmasiPenginapan;
use App\Models\User;
use PDF;
use DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->footer = Footer::select('konten')->first();
    }
    public function index()
    {
        $footer = $this->footer;
        $jumlah_post = Post::count();
        $jumlah_kategori = Kategori::count();

        $jumlah_transaksi = Transaksi::count();
        $jumlah_bukti = Konfirmasi::count();
        $jumlah_belumbayar = Transaksi::where('status', 1)->count();
        $jumlah_menunggu = Transaksi::where('status', 2)->count();
        $jumlah_dikonfirmasi = Transaksi::where('status', 3)->count();
        $jumlah_ditolak = Transaksi::where('status', 4)->count();

        $jumlah_transaksipenginapan = TransaksiPenginapan::count();
        $jumlah_buktipenginapan = KonfirmasiPenginapan::count();
        $jumlah_belumbayarpenginapan = TransaksiPenginapan::where('status', 1)->count();
        $jumlah_menunggupenginapan = TransaksiPenginapan::where('status', 2)->count();
        $jumlah_dikonfirmasipenginapan = TransaksiPenginapan::where('status', 3)->count();
        $jumlah_ditolakpenginapan = TransaksiPenginapan::where('status', 4)->count();

        $transaksi = Transaksi::select('id','tanggal','nama','jumlah','alamat','email','telp','total','slug','id_tiket','harga_tiket','id_user','status')->whereIn('status',['3'])->get();
        $pdf = PDF::loadview('admin/transaksi/cetaktransaksi', ['transaksi' => $transaksi]);

        return view('admin/dashboard', compact('footer','jumlah_post','jumlah_kategori','jumlah_transaksi','jumlah_bukti',
                    'jumlah_belumbayar','jumlah_menunggu','jumlah_dikonfirmasi','jumlah_ditolak','jumlah_transaksipenginapan',
                    'jumlah_buktipenginapan','jumlah_belumbayarpenginapan','jumlah_menunggupenginapan','jumlah_dikonfirmasipenginapan',
                    'jumlah_ditolakpenginapan'));
    }

    public function cetaktiketadmin()
    {
        $transaksi = Transaksi::select('id','tanggal','nama','jumlah','alamat','email','telp','total','slug','id_tiket','harga_tiket','id_user','status')->whereIn('status',['3'])->get();
        $pdf = PDF::loadview('admin/transaksi/cetaktransaksi', ['transaksi' => $transaksi]);
        $pdf->setPaper('A4','landscape');
        return $pdf->stream('laporan-transaksi.pdf');
    }

    public function cetakpenginapanadmin()
    {
        $transaksipenginapan = TransaksiPenginapan::select('id','checkin','checkout','jumlah_hari','nama','alamat','email','telp','total','catatan','slug','status','id_tipe','harga_penginapan','id_user','jumlah_unit')->whereIn('status',['2','3'])->get();
        $pdf = PDF::loadview('admin/transaksipenginapan/cetaktransaksi', ['transaksipenginapan' => $transaksipenginapan]);
        $pdf->setPaper('A4','landscape');
        return $pdf->stream('laporan-transaksi-penginapan.pdf');
    }

    public function grafikpenginapan()
    {
        $footer = $this->footer;
        $total = TransaksiPenginapan::select(DB::raw("CAST(SUM(total) as int) as total"))
        ->where('status','3')
        ->GroupBy(DB::raw("Month(created_at)"))
        ->pluck('total');

        $bulan = TransaksiPenginapan::select(DB::raw("MONTHNAME(created_at) as bulan"))
        ->orderBy('created_at', 'ASC')
        ->GroupBy(DB::raw("MONTHNAME(created_at)"))
        ->pluck('bulan');

        return view('pemilik/penginapan-grafik', compact('total','bulan','footer'));

    }

    public function grafiktiketmasuk()
    {
        $footer = $this->footer;
        $total = Transaksi::select(DB::raw("CAST(SUM(total) as int) as total"))
        ->where('status','3')
        ->GroupBy(DB::raw("Month(created_at)"))
        ->pluck('total');

        $bulan = Transaksi::select(DB::raw("MONTHNAME(created_at) as bulan"))
        ->orderBy('created_at', 'ASC')
        ->GroupBy(DB::raw("MONTHNAME(created_at)"))
        ->pluck('bulan');



        return view('pemilik/tiketmasuk-grafik', compact('total','bulan','footer'));

    }

}
