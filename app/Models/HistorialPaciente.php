<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property $id
 * @property $paciente_id
 * @property $doctor_id
 * @property $tipo_historial
 * @property $fecha
 * @property $file_url
 * @property $comentarios
 * Class HistorialPaciente
 * @since 1.0
 * @package App\Models
 */
class HistorialPaciente extends Model
{
    use HasFactory;
    use HasUuid;
}
