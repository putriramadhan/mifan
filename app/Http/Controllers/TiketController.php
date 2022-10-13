<?php

namespace App\Http\Controllers;

use App\Models\Tiket;
use App\Models\Footer;
use App\Models\Jenis;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TiketController extends Controller
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
        $tiket = Tiket::select('id','judul','harga','konten','id_jenis')->latest()->paginate(5);
        return view('admin/tiketmasuk/index', compact('tiket','footer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $footer = $this->footer;
        $jenis = Jenis::select('id','nama')->get();
        return view('admin/tiketmasuk/create', compact('footer','jenis'));
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
            'judul' => 'required',
            'harga' => 'required',
            'konten' =>'required',
            'jenis' =>'required',


        ]);

        Tiket::create([
            'harga' => $request->harga,
            'judul' => Str::title($request->judul),
            'konten' => $request->konten,
            'slug' => Str::slug($request->judul,'-'),
            'id_jenis' => $request->jenis,
        ]);

        $request->session()->flash('status','
        <div class="alert alert-success role-alert">
          Data berhasil ditambahkan!
        </div>
        ' );

      return redirect('/tiket');

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
        $tiket = Tiket::select('id', 'judul', 'harga','konten','created_at')->whereId($id)->firstOrFail();
        return view('admin/tiketmasuk/show', compact('tiket','footer'));
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
        $tiket = Tiket::select('id', 'judul', 'harga','konten','id_jenis')->whereId($id)->firstOrFail();
        return view('admin/tiketmasuk/edit', compact('tiket','footer','jenis'));
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
            'judul' => 'required',
            'harga' => 'required',
            'konten' =>'required',
            'jenis' =>'required',
        ]);

        Tiket::whereId($id)->update([
            'judul' => Str::title($request->judul),
            'konten' => $request->konten,
            'harga' => $request->harga,
            'slug' => Str::slug($request->judul,'-'),
            'id_jenis' => $request->jenis,
        ]);

        $request->session()->flash('status','
        <div class="alert alert-success role-alert">
          Data berhasil diubah
        </div>
        ' );
        return redirect('/tiket');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tiket = tiket::select('harga','konten','judul','id')->whereId($id)->delete();

        request()->session()->flash('status','
        <div class="alert alert-danger role-alert">
          Data berhasil dihapus
        </div>
        ' );
        return redirect('/tiket');

    }
}
