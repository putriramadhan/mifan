<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    use HasFactory;

    protected $table ='jenis';
    protected $fillable = ['nama', 'slug'];

    public function tiket()
    {
        return $this->hasMany(Tiket::class);
    }

    public function tipe()
    {
        return $this->hasMany(Tipe::class);
    }
}
