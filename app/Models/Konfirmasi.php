<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konfirmasi extends Model
{
    use HasFactory;
    protected $table = 'konfirmasi';
    protected $fillable = ['gambar','deskripsi','status_order','id_transaksi','id_user'];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class,'id_transaksi');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'id_user');
    }

}
