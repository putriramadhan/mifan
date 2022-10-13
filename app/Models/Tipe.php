<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipe extends Model
{
    use HasFactory;

    protected $table ='tipe_penginapan';
    protected $fillable = ['nama','gambar','deskripsi','harga','slug','status','id_jenis','jumlah_unit','kamar','tamu'];

    public function jenis()
    {
        return $this->belongsTo(Jenis::class,'id_jenis');
    }

    public function transaksipenginapan()
    {
        return $this->hasMany(TransaksiPenginapan::class);
    }

}
