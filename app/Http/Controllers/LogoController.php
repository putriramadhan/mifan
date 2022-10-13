<?php

namespace App\Http\Controllers;

use App\Models\Logo;
use App\Models\Footer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class LogoController extends Controller
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
        $logo = Logo::select('id', 'gambar')->first();
        return view('admin/logo/index', compact('logo','footer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $logo = Logo::select('id','gambar')->first();
        return view('admin/logo/edit', compact('logo','footer'));
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
            'logo'=>'mimes:jpg,jpeg,png',
        ]);

        $logo = Logo::select('gambar', 'id')->whereId($id)->first();
        File::delete('upload/logo/'. $logo->gambar);

        $request->logo->move('upload/logo', $request->logo->getClientOriginalName());

        $logo->update(['gambar' => $request->logo->getClientOriginalName()]);

        $request->session()->flash('status','
         <div class="alert alert-success role-alert">
           Data berhasil ditambahkan!
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
    public function destroy($id)
    {
        //
    }
}
