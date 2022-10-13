<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','telp','address',
    ];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }

    public function konfirmasi()
    {
        return $this->hasMany(Konfirmasi::class);
    }


    public function transaksipenginapan()
    {
        return $this->hasMany(TransaksiPenginapan::class);
    }

    public function konfirmasipenginapan()
    {
        return $this->hasMany(KonfirmasiPenginapan::class);
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
