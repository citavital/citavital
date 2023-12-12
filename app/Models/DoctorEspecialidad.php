<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorEspecialidad extends Model
{
    use HasFactory;
    use HasUuid;

    protected $table = 'doctor_especialidades';

    public function especialidad()
    {
        return $this->belongsTo(Especialidad::class);
    }
}
