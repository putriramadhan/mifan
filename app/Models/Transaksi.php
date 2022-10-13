<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';
    protected $fillable = ['tanggal','nama','jumlah','email','telp','total','slug','status','alamat','id_tiket','harga_tiket','id_user','created_at'];

    public function tiket()
    {
        return $this->belongsTo(Tiket::class,'id_tiket');
    }

    public function konfirmasi()
    {
        return $this->hasMany(Konfirmasi::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class,'id_user');
    }
}
