<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Post;
use App\Models\Footer;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PostController extends Controller
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
            $post = Post::select('id','judul','banner','id_kategori')->where('judul','LIKE','%'. request()->search.'%')->latest()->paginate(5);
            $search = request()->search;

            if (count($post) == 0){
                request()->session()->flash('search','
                <div class="alert alert-info mt-4" role="alert">
                Data yang dicari tidak ada
                </div>
                ');
            }
        } else {
            $post = Post::select('id','judul','banner','id_kategori')->latest()->paginate(5);
        }

        return view('admin/post/index', compact('post','footer','search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $footer = $this->footer;
        $kategori = Kategori::select('id','nama')->get();
        return view('admin/post/create', compact('kategori','footer'));
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
            'konten' =>'required',
            'kategori' =>'required',

        ]);

        $banner = time().'-'.$request->banner->getClientOriginalName();
        $request->banner->move('upload/post', $banner);

        Post::create([
            'banner' => $banner,
            'judul' => $request->judul,
            'konten' => $request->konten,
            'id_kategori' => $request->kategori,
            'slug' => Str::slug($request->judul,'-'),
        ]);

        $request->session()->flash('status','
        <div class="alert alert-success role-alert">
          Data berhasil ditambahkan!
        </div>
        ' );

      return redirect('/post');

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
        $post = Post::select('id', 'judul', 'banner','konten','created_at')->whereId($id)->firstOrFail();
        return view('admin/post/show', compact('post','footer'));
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
        $kategori = Kategori::select('id', 'nama')->get();
        $post = Post::select('id', 'judul', 'banner','konten','id_kategori')->whereId($id)->firstOrFail();
        return view('admin/post/edit', compact('post','kategori','footer'));
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
            'konten' =>'required',
            'kategori' =>'required',
        ]);

        $data = [
            'judul' => $request->judul,
            'konten' => $request->konten,
            'kategori' => $request->kategori,
            'slug' => Str::slug($request->judul,'-'),
        ];

        $post = Post::select('banner','id')->whereId($id)->first();

        if ($request->banner){
            File::delete('upload/post/'.$post->banner);

            $banner = time().'-'.$request->banner->getClientOriginalName();
            $request->banner->move('upload/post', $banner);

            $data['banner'] = $banner;
        }

        $post->update($data);

        $request->session()->flash('status','
        <div class="alert alert-success role-alert">
          Data berhasil diubah
        </div>
        ' );
        return redirect('/post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::select('banner','id')->whereId($id)->first();
        File::delete('upload/post/'.$post->banner);
        $post->delete();

        request()->session()->flash('status','
        <div class="alert alert-danger role-alert">
          Data berhasil dihapus
        </div>
        ' );
        return redirect('/post');

    }
}
