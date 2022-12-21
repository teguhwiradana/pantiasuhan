<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class binaan extends Model
{
    use HasFactory;
    protected $table = 'binaans';
    protected $primaryKey = 'id_binaan';
}
