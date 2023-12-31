<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

/**
 * Class User
 * @property $id
 * @property $name
 * @property $email
 * @property $tipo_usuario
 * @property $nacimiento
 * @property $genero
 * @property $direccion
 * @property $celular
 * @property $telefono
 * @property $altura
 * @property $tipo_altura
 * @property $peso
 * @property $tipo_peso
 * @property $imc
 * @property $presion_arterial
 * @property $alergias
 * @property $enfoque
 * @property $idiomas
 * @since 1.0
 * @package App\Models
 */
class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function historial(): HasMany
    {
        return $this->hasMany(HistorialPaciente::class, 'paciente_id');
    }

    public function doctorHospital(): HasMany
    {
        return $this->hasMany(DoctorHospital::class, 'doctor_id');
    }

    public function doctorEspecialidad(): HasMany
    {
        return $this->hasMany(DoctorEspecialidad::class, 'doctor_id');
    }

    public function doctorTratamiento()
    {
        return $this->hasMany(DoctorTratamiento::class, 'doctor_id');
    }
}
