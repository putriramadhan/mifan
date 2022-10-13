<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Footer;
use App\Models\Tipe;
use App\Models\TransaksiPenginapan;
use App\Models\User;
use App\Models\Tiket;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PDF;

class TransaksiPenginapanController extends Controller
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
        $transaksipenginapan = TransaksiPenginapan::select('id','checkin','checkout','jumlah_hari','nama','alamat','email','telp','total','catatan','slug',
        'status','id_tipe','harga_penginapan','id_user','created_at','jumlah_unit')->latest()->paginate(5);

        $search ='';
        if (request()->search) {
            $transaksipenginapan = TransaksiPenginapan::select('id','checkin','checkout','jumlah_hari','nama','alamat','email','telp','total','catatan','slug',
            'status','id_tipe','harga_penginapan','id_user','created_at','jumlah_unit')->where('nama','LIKE','%'. request()->search.'%')->latest()->paginate(5);
            $search = request()->search;

            if (count($transaksipenginapan) == 0){
                request()->session()->flash('search','
                <div class="alert alert-info mt-4" role="alert">
                Data yang dicari tidak ada
                </div>
                ');
            }
        } else {
            $transaksipenginapan = TransaksiPenginapan::select('id','checkin','checkout','jumlah_hari','nama','alamat','email','telp','total','catatan','slug',
            'status','id_tipe','harga_penginapan','id_user','created_at','jumlah_unit')->latest()->paginate(5);
        }

        return view('admin/transaksipenginapan/index', compact('transaksipenginapan','footer','search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Users::select( 'id','name')->get();
        $tipe = Tipe::select('id','nama','harga')->get();
        $footer = $this->footer;
        return view('artikel/penginapan', compact('user','tipe','footer'));
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
            'checkin' => 'required',
            'checkout' => 'required',
            'nama' => 'required',
            'email' =>'required',
            'telp' =>'required',
            'alamat' =>'required',
            'tipe' =>'required',
            'harga_penginapan' =>'required',
            'catatan' =>'required',
            'jumlah_hari'=>'required',
            'jumlah_unit' => 'required',
        ]);

        TransaksiPenginapan::create([
            'checkin' =>$request->checkin,
            'checkout' =>$request->checkout,
            'nama' => Str::title($request->nama),
            'slug' => Str::slug($request->nama,'-'),
            'email' =>$request->email,
            'telp' =>$request->telp,
            'total' => $request->harga_penginapan * $request->jumlah_hari * $request->jumlah_unit,
            'alamat' =>$request->alamat,
            'harga_penginapan' =>$request->harga_penginapan,
            'id_tipe' =>$request->tipe,
            'id_user' =>Auth::user()->id,
            'catatan' =>$request->catatan,
            'jumlah_hari'=>$request->jumlah_hari,
            'jumlah_unit' =>$request->jumlah_unit,
        ]);

        $request->session()->flash('status','
        <div class="alert alert-success role-alert">
          Data berhasil ditambahkan!
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
        $transaksipenginapan = TransaksiPenginapan::select('id','checkin','checkout','jumlah_hari','nama','alamat','email','telp','total','catatan','slug',
            'status','id_tipe','harga_penginapan','id_user','created_at','jumlah_unit')->whereId($id)->firstOrFail();
        return view('admin/transaksipenginapan/show', compact('transaksipenginapan','footer'));
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
        $transaksipenginapan = TransaksiPenginapan::select('id','checkin','checkout','jumlah_hari','nama','alamat','email','telp','total','catatan','slug',
            'status','id_tipe','harga_penginapan','id_user','created_at','jumlah_unit')->whereId($id)->delete();

        request()->session()->flash('status','
        <div class="alert alert-danger role-alert">
          Data berhasil dihapus
        </div>
        ' );
        return redirect('/transaksipenginapan');
    }

    public function cetak()
    {
        $transaksipenginapan = TransaksiPenginapan::select('id','checkin','checkout','jumlah_hari','nama','alamat','email','telp','total','catatan','slug','status','id_tipe','harga_penginapan','id_user','created_at','jumlah_unit')->where('status','3')->get();
        $pdf = PDF::loadview('admin/transaksipenginapan/cetaktransaksi', ['transaksipenginapan' => $transaksipenginapan]);
        $pdf->setPaper('A4','landscape');
        return $pdf->stream('laporan-transaksi-penginapan.pdf');
    }

    public function cetakpenginapan($id)
    {
        $transaksipenginapan = TransaksiPenginapan::select('id','checkin','checkout','jumlah_hari','nama','alamat','email','telp','total','catatan','slug','status','id_tipe','harga_penginapan','id_user','created_at','jumlah_unit')
        ->where('id',$id)->get();
        $pdf = PDF::loadview('artikel/cetakpenginapan', ['transaksipenginapan' => $transaksipenginapan]);
        return $pdf->download('penginapan.pdf');
    }

    public function cetakpertanggaltransaksipenginapan($tglawal, $tglakhir)
    {
        $transaksipenginapan = TransaksiPenginapan::select('id','checkin','checkout','jumlah_hari','nama','alamat','email','telp','total','catatan','slug','status','id_tipe','harga_penginapan','id_user','created_at','jumlah_unit')
        ->where('status',('3'))
        ->whereBetween('created_at',[$tglawal,$tglakhir])->get();

        $pdf = PDF::loadview('admin/transaksipenginapan/cetakpertanggaltransaksi', ['transaksipenginapan' => $transaksipenginapan]);
        $pdf->setPaper('A4','landscape');
        return $pdf->stream('laporan-transaksi-penginapan-pertanggal.pdf');
    }
    public function listtransaksipenginapan()
      {
        $footer = $this->footer;
        $transaksipenginapan = TransaksiPenginapan::select('id','checkin','checkout','jumlah_hari','nama','alamat','email','telp','total','catatan','slug','status','id_tipe','harga_penginapan','id_user','created_at','jumlah_unit')->where('status',('3'))->latest()->paginate(10);

        $search ='';
        if (request()->search) {
            $transaksipenginapan = TransaksiPenginapan::select('id','checkin','checkout','jumlah_hari','nama','alamat','email','telp','total','catatan','slug','status','id_tipe','harga_penginapan','id_user','created_at')->where('nama','LIKE','%'. request()->search.'%')->where('status',('3'))->latest()->paginate(10);
            $search = request()->search;

            if (count($transaksipenginapan) == 0){
                request()->session()->flash('search','
                <div class="alert alert-info mt-4" role="alert">
                Data yang dicari tidak ada
                </div>
                ');
            }
        } else {
            $transaksipenginapan = TransaksiPenginapan::select('id','checkin','checkout','jumlah_hari','nama','alamat','email','telp','total','catatan','slug','status','id_tipe','harga_penginapan','id_user','created_at')->where('status',('3'))->latest()->paginate(10);
        }

        return view('pemilik/listtransaksipenginapan', compact('transaksipenginapan','footer','search'));

      }
}
