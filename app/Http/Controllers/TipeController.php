<?php

namespace App\Http\Controllers;

use App\Models\Tipe;
use App\Models\Footer;
use App\Models\Jenis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class TipeController extends Controller
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

        $search ='';
        if (request()->search) {
            $tipe = Tipe::select('id', 'nama','gambar','deskripsi','harga','slug','status','id_jenis','jumlah_unit','kamar','tamu')->where('nama','LIKE','%'. request()->search.'%')->latest()->paginate(5);
            $search = request()->search;

            if (count($tipe) == 0){
                request()->session()->flash('search','
                <div class="alert alert-info mt-4" role="alert">
                Data yang dicari tidak ada
                </div>
                ');
            }
        } else {
            $tipe = Tipe::select('id', 'nama','gambar','deskripsi','harga','slug','status','id_jenis','jumlah_unit','kamar','tamu')->latest()->paginate(5);
        }

        return view('admin/tipepenginapan/index', compact('tipe','footer','search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenis = Jenis::select('id','nama')->get();
        $footer = $this->footer;
        return view('admin/tipepenginapan/create', compact('footer','jenis'));
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
            'nama' => 'required',
            'gambar' => 'required|mimes:jpg,jpeg,png',
            'deskripsi' => 'required',
            'harga' => 'required',
            'jenis' => 'required',
            'jumlah_unit'=>'required',
            'kamar' =>'required',
            'tamu' =>'required',
        ]);

        $gambar = time().'-'.$request->gambar->getClientOriginalName();
        $request->gambar->move('upload/tipe', $gambar);

        Tipe::create([
            'nama' => Str::title($request->nama),
            'slug' => Str::slug($request->nama,'-'),
            'gambar' => $gambar,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'status' => $request->status,
            'id_jenis' => $request->jenis,
            'jumlah_unit' => $request->jumlah_unit,
            'kamar' => $request->kamar,
            'tamu' => $request->tamu,

        ]);
        $request->session()->flash('status','
         <div class="alert alert-success role-alert">
           Data berhasil ditambahkan!
         </div>
       ' );

       return redirect('/tipe');
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
        $footer = $this->footer;
        $jenis = Jenis::select('id','nama')->get();
        $tipe = Tipe::select('id','nama','gambar','deskripsi','harga','status','jumlah_unit','kamar','tamu')->whereId($id)->firstOrFail();
        return view('admin/tipepenginapan/edit', compact('tipe','footer','jenis'));
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
        $request->validate([
            'nama' => 'required',
            'gambar' => 'mimes:jpg,jpeg,png',
            'deskripsi' =>'required',
            'harga' =>'required',
            'jenis' =>'required',
            'jumlah_unit'=>'required',
            'kamar' => 'required',
            'tamu' => 'required',
        ]);

        $data = [
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'slug' => Str::slug($request->nama,'-'),
            'status' => $request->status,
            'id_jenis' => $request->jenis,
            'jumlah_unit' => $request->jumlah_unit,
            'kamar' => $request->kamar,
            'tamu' => $request->tamu,
        ];

        $tipe = Tipe::select('gambar','id')->whereId($id)->first();

        if ($request->gambar){
            File::delete('upload/tipe/'.$tipe->gambar);

            $gambar = time().'-'.$request->gambar->getClientOriginalName();
            $request->gambar->move('upload/tipe', $gambar);

            $data['gambar'] = $gambar;
        }

        $tipe->update($data);

        $request->session()->flash('status','
        <div class="alert alert-success role-alert">
          Data berhasil diubah
        </div>
        ' );
        return redirect('/tipe');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipe = Tipe::select('gambar','id')->whereId($id)->first();
        File::delete('upload/tipe/'.$tipe->banner);
        $tipe->delete();

        request()->session()->flash('status','
        <div class="alert alert-danger role-alert">
          Data berhasil dihapus
        </div>
        ' );
        return redirect('/tipe');
    }
}
