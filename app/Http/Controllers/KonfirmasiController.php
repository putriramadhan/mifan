<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Konfirmasi;
use App\Models\Transaksi;
use App\Models\Footer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class KonfirmasiController extends Controller
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
        $konfirmasi = Konfirmasi::select('id','gambar','deskripsi','id_transaksi','id_user','status_order')->latest()->paginate(5);


        return view('admin/konfirmasi/index', compact('konfirmasi','footer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Users::select( 'id','name')->get();
        $transaksi = Transaksi::select('id','nama')->get();
        $footer = $this->footer;
        return view('artikel/masuk', compact('footer','transaksi','user'));
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
            'transaksi' =>'required',


        ]);

        $gambar = time().'-'.$request->gambar->getClientOriginalName();
        $request->gambar->move('upload/bukti', $gambar);

        $konfirmasi = Konfirmasi::create([
            'gambar' => $gambar,
            'deskripsi' => $request->deskripsi,
            'id_transaksi' => $request->transaksi,
            'id_user' =>Auth::user()->id,
            'status_order' => 2,

        ]);

        $transaksi = Transaksi::where('id',$request->transaksi)->first();
        $transaksi->status = '2';
        $transaksi->save();



        $request->session()->flash('status','
        <div class="alert alert-success role-alert">
          Bukti Pembayaran berhasil diupload, Silahkan menunggu konfirmasi admin dalam waktu 1x24jam
        </div>
        ' );

      return redirect('/detail');
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
        $konfirmasi = Konfirmasi::select('id','gambar','deskripsi','id_transaksi','id_user')->whereId($id)->firstOrFail();
        return view('admin/konfirmasi/show', compact('konfirmasi','footer'));
    }




    public function terima($id)
    {
        $footer = $this->footer;
        $konfirmasi = Konfirmasi::select('status_order','id')->where('id_transaksi',
        $id)->update(['status_order' => '3']);

        $transaksi = Transaksi::select('id','status')->where('id',$id)->update(['status' => '3']);

        $konfirmasi = Konfirmasi::select('id')->where('id',$konfirmasi)->first();


        request()->session()->flash('status','
        <div class="alert alert-success role-alert">
          Data berhasil dikonfirmasi
        </div>
        ' );
        return redirect('/konfirmasi');
    }

    public function tolak($id)
    {
        $footer = $this->footer;
        $konfirmasi = Konfirmasi::select('status_order','id')->where('id_transaksi',
        $id)->update(['status_order' => '4']);

        $transaksi = Transaksi::select('id','status')->where('id',$id)->update(['status' => '4']);

        $konfirmasi = Konfirmasi::select('id')->where('id',$konfirmasi)->first();


        request()->session()->flash('status','
        <div class="alert alert-dark role-alert">
          Data berhasil ditolak
        </div>
        ' );
        return redirect('/konfirmasi');
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
        $konfirmasi = Konfirmasi::select('id','gambar','deskripsi','id_transaksi','id_user','status_order')->whereId($id)->delete();
        request()->session()->flash('status','
        <div class="alert alert-danger role-alert">
          Data berhasil dihapus
        </div>
        ' );
        return redirect('/konfirmasi');

    }
}
