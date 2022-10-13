<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KonfirmasiPenginapan extends Model
{
    use HasFactory;
    protected $table = 'konfirmasi_penginapan';
    protected $fillable = ['gambar','deskripsi','status_order','id_transaksi_penginapan','id_user'];

    public function transaksipenginapan()
    {
        return $this->belongsTo(TransaksiPenginapan::class,'id_transaksi_penginapan');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'id_user');
    }




}
