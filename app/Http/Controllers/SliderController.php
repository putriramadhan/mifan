<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\Footer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
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
        $slider = Slider::select('id','slug','banner','judul')->latest()->paginate(10);

        return view('admin/slider/index', compact('slider','footer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $footer = $this->footer;
        return view('admin/slider/create',compact('footer'));
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
            'banner' => 'required|mimes:jpg,jpeg,png',

        ]);

        $banner = time().'-'.$request->banner->getClientOriginalName();
        $request->banner->move('upload/slider', $banner);

        Slider::create([
            'banner' => $banner,
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul,'-'),
        ]);

        $request->session()->flash('status','
        <div class="alert alert-success role-alert">
          Data berhasil ditambahkan!
        </div>
        ' );

      return redirect('/slider');
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
        $slider = Slider::select('id', 'judul', 'banner','created_at')->whereId($id)->firstOrFail();
        return view('admin/slider/show', compact('slider','footer'));
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
        $slider = Slider::select('id', 'judul', 'banner')->whereId($id)->firstOrFail();
        return view('admin/slider/edit', compact('slider','footer'));
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
            'banner' => 'mimes:jpg,jpeg,png',
        ]);

        $data = [
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul,'-'),
        ];

        $slider = Slider::select('banner','id')->whereId($id)->first();

        if ($request->banner){
            File::delete('upload/slider/'.$slider->banner);

            $banner = time().'-'.$request->banner->getClientOriginalName();
            $request->banner->move('upload/slider', $banner);

            $data['banner'] = $banner;
        }

        $slider->update($data);

        $request->session()->flash('status','
        <div class="alert alert-success role-alert">
          Data berhasil diubah
        </div>
        ' );
        return redirect('/slider');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::select('banner','id')->whereId($id)->delete();

        request()->session()->flash('status','
        <div class="alert alert-danger role-alert">
          Data berhasil dihapus
        </div>
        ' );
        return redirect('/slider');
    }
}
