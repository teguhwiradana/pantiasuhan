<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    use HasFactory;
    protected $table='riwayat';
    protected $guarded = ['id'];

    public function produk(){
        return $this->belongsTo(Produk::class);
    }
    public function pesan(){
        return $this->belongsTo(Pesan::class);
    }
}
