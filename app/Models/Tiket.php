<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    use HasFactory;

    protected $table = 'tiket';
    protected $fillable = ['id','judul','konten','harga','slug','id_jenis'];

    public function jenis()
    {
        return $this->belongsTo(Jenis::class,'id_jenis');
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }


}
