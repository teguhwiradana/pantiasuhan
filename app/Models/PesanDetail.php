<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesanDetail extends Model
{
    use HasFactory;
    protected $table='pesananDetail';
    protected $guarded = ['id'];

    public function produk(){
        return $this->belongsTo(Produk::class, 'produk_id');
    }
    public function pesan(){
        return $this->belongsTo(Pesan::class);
    }
}
