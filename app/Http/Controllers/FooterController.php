<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $footer = Footer::select('id','konten')->first();
        return view('admin/footer/index', compact('footer'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'konten' => 'required',
        ]);

        Footer::whereId($id)->update([
            'konten' => $request->konten

        ]);

        $request->session()->flash('status','
        <div class="alert alert-success role-alert">
          Data berhasil diubah
        </div>
        ' );
        return redirect('/footer');
    }


}
