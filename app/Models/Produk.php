<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table='produk';

    protected $fillable = [
        'nama',
        'gambar',
        'harga',
        'tipeproduk_id',
    ];

    public function PesanDetails()
    {
        return $this->hasMany(PesanDetail::class);
    }

    public function Riwayat()
    {
        return $this->hasMany(Riwayat::class);
    }

    // public function TipeProduk()
    // {
    //     return $this->hasMany(TipeProduk::class);
    // }

    public function tipeproduk()
    {
        return $this->belongsTo(TipeProduk::class);
    }
}
