<?php

namespace App\Models;

use App\Models\donatur;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;
    protected $table = 'banks';
    protected $primaryKey = 'id_bank';

    protected $guarded = ['id'];

    public function pesan()
    {
        return $this->hasMany(Pesan::class);
    }

    public function donatur()
    {
        return $this->hasMany(donatur::class);
    }
}
