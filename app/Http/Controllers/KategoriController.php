<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Footer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KategoriController extends Controller
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
        $kategori = Kategori::select('id', 'nama', 'slug')->latest()->paginate(5);

        $search ='';
        if (request()->search) {
            $kategori = Kategori::select('id', 'nama', 'slug')->where('nama','LIKE','%'. request()->search.'%')->latest()->paginate(5);
            $search = request()->search;

            if (count($kategori) == 0){
                request()->session()->flash('search','
                <div class="alert alert-info mt-4" role="alert">
                Data yang dicari tidak ada
                </div>
                ');
            }
        } else {
            $kategori = Kategori::select('id', 'nama', 'slug')->latest()->paginate(5);
        }

        return view('admin/kategori/index', compact('kategori','footer','search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $footer = $this->footer;
        return view('admin/kategori/create', compact('footer'));
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
        ]);

        Kategori::create([
            'nama' => Str::title($request->nama),
            'slug' => Str::slug($request->nama,'-')
        ]);

       return redirect('/kategori');
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
        $kategori = Kategori::select('id','nama')->whereId($id)->first();
        return view('admin/kategori/edit',compact('kategori','footer'));
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
        ]);

        Kategori::whereId($id)->update([
            'nama' => Str::title($request->nama),
            'slug' => Str::slug($request->nama,'-')]);

        $request->session()->flash('status','
            <div class="alert alert-success role-alert">
              Data berhasil diubah!
            </div>
          ' );

          return redirect('/kategori');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Kategori::whereId($id)->delete();
        $request->session()->flash('status','
         <div class="alert alert-danger role-alert">
          Data berhasil dihapus!
         </div>
       ' );
       return redirect('/kategori');
    }
}
