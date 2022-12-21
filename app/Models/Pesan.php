<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    use HasFactory;
    protected $table='pesans';
    protected $guarded = ['id'];

    public function bank(){
        return $this->belongsTo(Bank::class, 'bank_id');
    }
    public function pesanDetail(){
        return $this->hasMany(PesanDetail::class);
    }
    public function riwayat(){
        return $this->hasMany(Riwayat::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
