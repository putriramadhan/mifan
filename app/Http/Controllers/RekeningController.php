<?php

namespace App\Http\Controllers;

use App\Models\Rekening;
use App\Models\Footer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class RekeningController extends Controller
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
        $rekening = Rekening::select('id','bank','nama_akun','nomor_rekening','deskripsi','gambar')->latest()->paginate(10);

        return view('admin/rekening/index', compact('rekening','footer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $footer = $this->footer;
        return view('admin/rekening/create',compact('footer'));
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
            'bank' => 'required',
            'nama_akun' => 'required',
            'nomor_rekening' =>'required',
            'deskripsi' =>'required',
            'gambar' =>'mimes:jpg,jpeg,png',

        ]);

        $gambar = time().'-'.$request->gambar->getClientOriginalName();
        $request->gambar->move('upload/rekening', $gambar);

        Rekening::create([
            'gambar' => $gambar,
            'bank' => $request->bank,
            'nama_akun' => $request->nama_akun,
            'nomor_rekening' => $request->nomor_rekening,
            'deskripsi' => $request->deskripsi,
        ]);

        $request->session()->flash('status','
        <div class="alert alert-success role-alert">
          Data berhasil ditambahkan!
        </div>
        ' );

      return redirect('/rekening');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
        $rekening = Rekening::select('id','bank','nama_akun','nomor_rekening','deskripsi')->whereId($id)->firstOrFail();
        return view('admin/rekening/edit', compact('rekening','footer'));
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
            'bank' => 'required',
            'nama_akun' => 'required',
            'nomor_rekening' =>'required',
            'deskripsi' =>'required',
            'gambar' =>'mimes:jpg,jpeg,png',

        ]);


        $data = [
            'bank' => Str::title($request->bank),
            'nama_akun' => $request->nama_akun,
            'nomor_rekening' => $request->nomor_rekening,
            'deskripsi' => $request->deskripsi,
        ];

        $rekening = Rekening::select('gambar','id')->whereId($id)->first();

        if ($request->gambar){
            File::delete('upload/rekening/'.$rekening->gambar);

            $gambar = time().'-'.$request->gambar->getClientOriginalName();
            $request->gambar->move('upload/rekening', $gambar);

            $data['gambar'] = $gambar;
        }

        $rekening->update($data);

        $request->session()->flash('status','
        <div class="alert alert-success role-alert">
          Data berhasil diubah!
        </div>
        ' );
        return redirect('/rekening');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rekening = Rekening::select('id', 'bank','nama_akun','nomor_rekening','deskripsi')->whereId($id)->delete();
        request()->session()->flash('status','
        <div class="alert alert-danger role-alert">
          Data berhasil dihapus
        </div>
        ' );
        return redirect('/rekening');
    }
}
