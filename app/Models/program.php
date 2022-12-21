<?php

namespace App\Models;
use App\Models\donatur;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class program extends Model
{
    use HasFactory;
    protected $table='programs';
    protected $primaryKey = 'id_program'; 

    protected $fillable = [
        // 'id_program',
        'nama_program',
        'dns_butuh',
        'dns_terkumpul',
    ];
    public function donatur()
    {
        return $this->hasMany(donatur::class);
    }
}
