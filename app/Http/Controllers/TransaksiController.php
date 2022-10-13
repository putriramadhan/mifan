<?php

namespace App\Http\Controllers;


use Auth;
use App\Models\Footer;
use App\Models\Transaksi;
use App\Models\Tiket;
use App\Models\User;
use App\Mail\TransaksiMail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use PDF;



class TransaksiController extends Controller
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
        $transaksi = Transaksi::select('id','tanggal','nama','jumlah','alamat','email','telp','total','slug','id_tiket','harga_tiket','id_user','status','created_at')->latest()->paginate(5);

        $search ='';
        if (request()->search) {
            $transaksi = Transaksi::select('id','tanggal','nama','jumlah','alamat','email','telp','total','slug','id_tiket','harga_tiket','id_user','status','created_at')->where('nama','LIKE','%'. request()->search.'%')->latest()->paginate(5);
            $search = request()->search;

            if (count($transaksi) == 0){
                request()->session()->flash('search','
                <div class="alert alert-info mt-4" role="alert">
                Data yang dicari tidak ada
                </div>
                ');
            }
        } else {
            $transaksi = Transaksi::select('id','tanggal','nama','jumlah','alamat','email','telp','total','slug','id_tiket','harga_tiket','id_user','status','created_at')->latest()->paginate(5);
        }

        return view('admin/transaksi/index', compact('transaksi','footer','search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Users::select( 'id','name')->get();
        $tiket = Tiket::select('id','judul','harga')->get();
        $footer = $this->footer;
        return view('artikel/masuk', compact('user','tiket','footer'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required',
            'nama' => 'required',
            'jumlah' =>'required',
            'email' =>'required',
            'telp' =>'required',
            'alamat' =>'required',
            'tiket' =>'required',
            'harga' =>'required',
        ]);

        Transaksi::create([
            'tanggal' => $request->tanggal,
            'nama' => Str::title($request->nama),
            'slug' => Str::slug($request->nama,'-'),
            'jumlah' =>$request->jumlah,
            'email' =>$request->email,
            'telp' =>$request->telp,
            'total' => $request->harga * $request->jumlah,
            'id_tiket' =>$request->tiket,
            'harga_tiket' =>$request->harga,
            'alamat' =>$request->alamat,
            'id_user' =>Auth::user()->id,

        ]);

        $request->session()->flash('status','
        <div class="alert alert-success role-alert">
          Data berhasil ditambahkan!
        </div>
        ' );

       // $this->sendKonfirmasiTransaksiMail($transaksi);

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
        //
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
        $transaksi = Transaksi::select('id','tanggal','nama','jumlah','alamat','email','telp','total','slug','created_at')->whereId($id)->delete();

        request()->session()->flash('status','
        <div class="alert alert-danger role-alert">
          Data berhasil dihapus
        </div>
        ' );
        return redirect('/transaksi');

    }

    public function cetak()
    {
        $transaksi = Transaksi::select('id','tanggal','nama','jumlah','alamat','email','telp','total','slug','id_tiket','harga_tiket','id_user','status','created_at')->where('status',('3'))->get();
        $pdf = PDF::loadview('admin/transaksi/cetaktransaksi', ['transaksi' => $transaksi]);
        $pdf->setPaper('A4','landscape');
        return $pdf->stream('laporan-transaksi.pdf');
    }

    public function cetaktiketmasuk($id)
    {
        $transaksi = Transaksi::select('id','tanggal','nama','jumlah','alamat','email','telp','total','slug','id_tiket','harga_tiket','id_user','status','created_at')
        ->where('id',$id)->get();
        $pdf = PDF::loadview('artikel/cetaktiket', ['transaksi' => $transaksi]);
        return $pdf->download('tiket-masuk.pdf');
    }

    public function cetakpertanggaltransaksi($tglawal, $tglakhir)
    {
        $transaksi = Transaksi::select('id','tanggal','nama','jumlah','alamat','email','telp','total','slug','id_tiket','harga_tiket','id_user','status','created_at')
        ->where('status',('3'))
        ->whereBetween('created_at',[$tglawal,$tglakhir])->get();

        $pdf = PDF::loadview('admin/transaksi/cetakpertanggaltransaksi', ['transaksi' => $transaksi]);
        $pdf->setPaper('A4','landscape');
        return $pdf->stream('laporan-transaksi-pertanggal.pdf');
    }

    public function listtransaksitiket()
    {
        $footer = $this->footer;
        $transaksi = Transaksi::select('id','tanggal','nama','jumlah','alamat','email','telp','total','slug','id_tiket','harga_tiket','id_user','status','created_at')->where('status',('3'))->latest()->paginate(10);

        $search ='';
        if (request()->search) {
            $transaksi = Transaksi::select('id','tanggal','nama','jumlah','alamat','email','telp','total','slug','id_tiket','harga_tiket','id_user','status','created_at')->where('nama','LIKE','%'. request()->search.'%')->where('status',('3'))->latest()->paginate(10);
            $search = request()->search;

            if (count($transaksi) == 0){
                request()->session()->flash('search','
                <div class="alert alert-info mt-4" role="alert">
                Data yang dicari tidak ada
                </div>
                ');
            }
        } else {
            $transaksi = Transaksi::select('id','tanggal','nama','jumlah','alamat','email','telp','total','slug','id_tiket','harga_tiket','id_user','status','created_at')->where('status',('3'))->latest()->paginate(10);
        }

        return view('pemilik/listtransaksitiket', compact('transaksi','footer','search'));
      }

      public function sendKonfirmasiTransaksiMail($transaksi)
      {
        Mail::to($transaksi->email)->send(new TransaksiMail($transaksi));

      }



}
