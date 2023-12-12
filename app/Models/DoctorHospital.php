<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DoctorHospital extends Model
{
    use HasFactory;
    use HasUuid;

    protected $table = 'doctor_hospitales';

    public function Hospital() : BelongsTo
    {
        return $this->belongsTo(Hospital::class);
    }
}
