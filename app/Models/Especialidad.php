<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    use HasFactory;
    use HasUuid;

    protected $table = 'especialidades';

    protected $fillable = [
        'id',
        'nombre'
    ];
}
