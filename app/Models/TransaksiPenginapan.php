<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiPenginapan extends Model
{
    use HasFactory;
    protected $table = 'transaksi_penginapan';
    protected $fillable = ['checkin','checkout','jumlah_hari','nama','alamat','email','telp','total','slug','status','catatan','id_tipe','harga_penginapan','id_user','created_at','jumlah_unit'];

    public function tipe()
    {
        return $this->belongsTo(Tipe::class,'id_tipe');
    }

    public function konfirmasi()
    {
        return $this->hasMany(KonfirmasiPenginapan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class,'id_user');
    }
}
