<?php

namespace App\Models;
use App\Models\Bank;
use App\Models\program;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class donatur extends Model
{
    use HasFactory;
    protected $table="donaturs"; 

    protected $fillable = [
        'id_donatur',
        'id_pengguna',
        'id_bank',
        'id_program',
        'name',
        'tgl_donasi',
        'alamat',
        'nominal',
        'atas_nama',
        'nama_bank',
        'no_rekening',
        'keterangan',
        'bukti_tf',
        'status',
    ];
    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }
    public function program()
    {
        return $this->belongsTo(program::class, 'id_program');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}