<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\KonfirmasiController;
use App\Http\Controllers\TipeController;
use App\Http\Controllers\TransaksiPenginapanController;
use App\Http\Controllers\KonfirmasiPenginapanController;
use App\Http\Controllers\RekeningController;
use App\Http\Controllers\PemilikController;
use App\Http\Controllers\EmailController;

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('cek-role', function (){
    if (auth()->user()->hasRole('admin', 'pemilik')) {
        return redirect('/dashboard');
    }else{
        return redirect('/');
    }

});

Route::group(['middleware' => ['verified', 'role:admin|pemilik']], function ()
{
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::resource('/kategori', KategoriController::class);
    Route::resource('/post', PostController::class);
    Route::resource('/slider', SliderController::class);
    Route::resource('/logo', LogoController::class);

    Route::post('post/search', [PostController::class, 'index']);
    Route::post('kategori/search', [KategoriController::class, 'index']);
    Route::post('tipe/search', [TipeController::class, 'index']);
    Route::post('transaksi/search', [TransaksiController::class, 'index']);
    Route::post('transaksipenginapan/search', [TransaksiPenginapanController::class, 'index']);
    Route::post('konfirmasi/search', [KonfirmasiController::class, 'index']);
    Route::post('konfirmasipenginapan/search', [KonfirmasiPenginapanController::class, 'index']);

    Route::resource('/jenis', JenisController::class);
    Route::resource('/tiket', TiketController::class);
    Route::resource('/transaksi', TransaksiController::class);
    Route::resource('/transaksipenginapan', TransaksiPenginapanController::class);
    Route::resource('/rekening', RekeningController::class);

    Route::resource('/konfirmasi', KonfirmasiController::class);
    Route::get('/konfirmasi/aksi/{id_transaksi}', [KonfirmasiController::class,'aksi']);
    Route::get('/konfirmasi/terima/{id_transaksi}', [KonfirmasiController::class,'terima']);
    Route::get('/konfirmasi/tolak/{id_transaksi}',[KonfirmasiController::class,'tolak']);

    Route::resource('/konfirmasipenginapan', KonfirmasiPenginapanController::class);
    Route::get('/konfirmasipenginapan/aksi/{id_transaksi_penginapan}', [KonfirmasiPenginapanController::class,'aksi']);
    Route::get('/konfirmasipenginapan/terima/{id_transaksi_penginapan}', [KonfirmasiPenginapanController::class,'terima']);
    Route::get('/konfirmasipenginapan/tolak/{id_transaksi_penginapan}',[KonfirmasiPenginapanController::class,'tolak']);

    Route::resource('/tipe', TipeController::class);
    Route::get('/cetaktransaksi', [TransaksiController::class, 'cetak']);

    Route::get('/cetaktiketadmin', [DashboardController::class, 'cetaktiketadmin']);
    Route::get('/cetakpenginapanadmin', [DashboardController::class, 'cetakpenginapanadmin']);

    Route::get('/cetakpertanggaltransaksi/{tglawal}/{tglakhir}', [TransaksiController::class, 'cetakpertanggaltransaksi']);
    Route::get('/cetaktransaksipenginapan', [TransaksiPenginapanController::class, 'cetak']);
    Route::get('/cetakpertanggaltransaksipenginapan/{tglawal}/{tglakhir}', [TransaksiPenginapanController::class, 'cetakpertanggaltransaksipenginapan']);

    Route::get('/grafikpenginapan', [DashboardController::class,'grafikpenginapan']);
    Route::get('/grafiktiketmasuk', [DashboardController::class,'grafiktiketmasuk']);

    Route::get('/footer',[FooterController::class,'index']);
    Route::patch('/footer/{id}', [FooterController::class, 'update']);

    Route::get('/user/{id}/setting', [UserController::class,'setting']);
    Route::patch('/user/{id}/setting', [UserController::class,'ubah_password']);

    Route::resource('/admin', AdminController::class);
    Route::resource('/customer', CustomerController::class);
    Route::resource('/pemilik', PemilikController::class);

    Route::get('/pemiliktransaksitiketmasuk', [TransaksiController::class, 'listtransaksitiket']);
    Route::get('/pemiliktransaksipenginapan', [TransaksiPenginapanController::class, 'listtransaksipenginapan']);

    Route::get('/email', [EmailController::class,'kirimtiket']);

});

Route::group(['middleware' => ['verified', 'role:customer']], function ()
{
    Route::post('/konfirmasi/store', [KonfirmasiController::class,'store']);
    Route::post('/konfirmasipenginapan/store', [KonfirmasiPenginapanController::class,'store']);
    Route::get('/detail', [ArtikelController::class, 'detail']);
    Route::get('/detailpenginapan',[ArtikelController::class, 'detailpenginapan']);
    Route::get('/cetaktiketmasuk/{id}', [TransaksiController::class, 'cetaktiketmasuk']);
    Route::get('/cetakpenginapan/{id}', [TransaksiPenginapanController::class, 'cetakpenginapan']);
    Route::resource('/transaksicustomer', TransaksiController::class);
    Route::resource('/transaksipenginapancustomer', TransaksiPenginapanController::class);



});
    Route::resource('/konfirmasi', KonfirmasiController::class);
    Route::get('/', [ArtikelController::class, 'index']);
    Route::get('/{slug}',[ArtikelController::class,'artikel']);
    Route::get('/artikel-kategori/{slug}',[ArtikelController::class,'kategori']);
    Route::get('/artikel-jenis/{slug}',[ArtikelController::class,'jenis']);




