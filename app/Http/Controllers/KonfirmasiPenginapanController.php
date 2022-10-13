<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\KonfirmasiPenginapan;
use App\Models\TransaksiPenginapan;
use App\Models\Footer;
use App\Models\User;
use Illuminate\Support\Facades\File;

class KonfirmasiPenginapanController extends Controller
{
    public function __construct()
    {
        $this->footer = Footer::select('konten')->first();

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $footer = $this->footer;
        $konfirmasipenginapan = KonfirmasiPenginapan::select('id','gambar','deskripsi','status_order','id_user','id_transaksi_penginapan')->latest()->paginate(5);

        return view('admin/konfirmasipenginapan/index', compact('konfirmasipenginapan','footer'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $transaksipenginapan = TransaksiPenginapan::select('id','nama')->get();
        $footer = $this->footer;
        $user = Users::select( 'id','name')->get();
        return view('artikel/penginapan', compact('footer','transaksipenginapan','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'required|mimes:jpg,jpeg,png',
            'deskripsi' =>'required',
            'transaksipenginapan' =>'required',

        ]);

        $gambar = time().'-'.$request->gambar->getClientOriginalName();
        $request->gambar->move('upload/buktipenginapan', $gambar);

        $konfirmasipenginapan = KonfirmasiPenginapan::create([
            'gambar' => $gambar,
            'deskripsi' => $request->deskripsi,
            'id_transaksi_penginapan' => $request->transaksipenginapan,
            'id_user' =>Auth::user()->id,
            'status_order' => 2,

        ]);

        $transaksipenginapan = TransaksiPenginapan::where('id',$request->transaksipenginapan)->first();
        $transaksipenginapan->status = '2';
        $transaksipenginapan->save();



        $request->session()->flash('status','
        <div class="alert alert-success role-alert">
        Bukti Pembayaran berhasil diupload, Silahkan menunggu konfirmasi admin dalam waktu 1x24jam
        </div>
        ' );

      return redirect('/detailpenginapan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $footer = $this->footer;
        $konfirmasipenginapan = KonfirmasiPenginapan::select('id','gambar','deskripsi','status_order','id_user','id_transaksi_penginapan')->whereId($id)->firstOrFail();
        return view('admin/konfirmasipenginapan/show', compact('konfirmasipenginapan','footer'));
    }

    public function terima($id)
    {
        $footer = $this->footer;
        $konfirmasipenginapan = KonfirmasiPenginapan::select('status_order','id')->where('id_transaksi_penginapan',
        $id)->update(['status_order' => '3']);

        $transaksipenginapan = TransaksiPenginapan::select('id','status')->where('id',$id)->update(['status' => '3']);

        $konfirmasipenginapan = KonfirmasiPenginapan::select('id')->where('id',$konfirmasipenginapan)->first();


        request()->session()->flash('status','
        <div class="alert alert-success role-alert">
          Data berhasil dikonfirmasi
        </div>
        ' );
        return redirect('/konfirmasipenginapan');
    }

    public function tolak($id)
    {
        $footer = $this->footer;
        $konfirmasipenginapan = KonfirmasiPenginapan::select('status_order','id')->where('id_transaksi_penginapan',
        $id)->update(['status_order' => '4']);

        $transaksipenginapan = TransaksiPenginapan::select('id','status')->where('id',$id)->update(['status' => '4']);

        $konfirmasipenginapan = KonfirmasiPenginapan::select('id')->where('id',$konfirmasipenginapan)->first();


        request()->session()->flash('status','
        <div class="alert alert-dark role-alert">
          Data berhasil ditolak
        </div>
        ' );
        return redirect('/konfirmasipenginapan');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $konfirmasipenginapan = KonfirmasiPenginapan::select('id','gambar','deskripsi','status_order','id_user','id_transaksi_penginapan')->whereId($id)->delete();
        request()->session()->flash('status','
        <div class="alert alert-danger role-alert">
          Data berhasil dihapus
        </div>
        ' );
        return redirect('/konfirmasipenginapan');
    }
}
