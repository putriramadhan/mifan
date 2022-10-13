<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Footer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class PemilikController extends Controller
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

        if(request()){
            $pemilik = User::join('model_has_roles','users.id','=','model_has_roles.model_id')
            ->where('role_id', 3)
            ->select('id','name','email')
            ->paginate(5);
        } else{
            $pemilik = User::join('model_has_roles','users.id','=','model_has_roles.model_id')
            ->where('role_id', 3)
            ->select('id','name','email')
            ->paginate(5);
        }
        return view('admin/pemilik/index', compact('pemilik','footer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $footer = $this->footer;
        return view('admin/pemilik/create', compact('footer'));
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
            'name' =>'required',
            'email' =>'required|unique:users|email',
            'password' =>'required|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ])->assignRole('pemilik');

        $request->session()->flash('status','
        <div class="alert alert-success role-alert">
          Data berhasil ditambahkan!
        </div>
        ' );

      return redirect('/pemilik');
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
    public function destroy(Request $request, $id)
    {
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        User::whereId($id)->delete();
        $request->session()->flash('status','
         <div class="alert alert-danger role-alert">
          Data berhasil dihapus!
         </div>
       ' );
       return redirect('/pemilik');
    }
}
