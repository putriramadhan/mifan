<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use App\Models\Footer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class JenisController extends Controller
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
        $jenis = Jenis::select('id', 'nama', 'slug')->latest()->paginate(5);
        ;
        return view('admin/jenis/index', compact('jenis','footer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $footer = $this->footer;
        return view('admin/jenis/create', compact('footer'));
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

        Jenis::create([
            'nama' => Str::title($request->nama),
            'slug' => Str::slug($request->nama,'-')
        ]);
        $request->session()->flash('status','
         <div class="alert alert-success role-alert">
           Data berhasil ditambahkan!
         </div>
       ' );

       return redirect('/jenis');
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
        $jenis = Jenis::select('id','nama')->whereId($id)->first();
        return view('admin/jenis/edit',compact('jenis','footer'));
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

        Jenis::whereId($id)->update([
            'nama' => Str::title($request->nama),
            'slug' => Str::slug($request->nama,'-')]);

        $request->session()->flash('status','
            <div class="alert alert-success role-alert">
              Data berhasil diubah!
            </div>
          ' );

          return redirect('/jenis');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Jenis::whereId($id)->delete();
        $request->session()->flash('status','
         <div class="alert alert-danger role-alert">
          Data berhasil dihapus!
         </div>
       ' );
       return redirect('/jenis');
    }
}
