<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipeProduk extends Model
{
    use HasFactory;
    protected $table='tipeproduk';

    protected $fillable = [
        'nama',
       
    ];

    // public function produk(){
    //     return $this->belongsTo(Produk::class);
    // }

    public function produk()
    {
        return $this->hasMany(Produk::class);
    }
}
