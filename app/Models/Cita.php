<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property $id
 * @property $usuario_id
 * @property $doctor_id
 * @property $hospital_id
 * @property $fecha
 * @property $hora
 * @property $cancelada
 * Class Cita
 * @since 1.0
 * @package App\Models
 */
class Cita extends Model
{
    use HasFactory;
    use HasUuid;

    public function doctor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }

    public function hospital(): BelongsTo
    {
        return $this->belongsTo(Hospital::class);
    }

    public function paciente(): BelongsTo
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}
