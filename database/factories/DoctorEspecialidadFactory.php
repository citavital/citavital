<?php

namespace Database\Factories;

use App\Models\Doctor;
use App\Models\DoctorEspecialidad;
use App\Models\Especialidad;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DoctorEspecialidad>
 */
class DoctorEspecialidadFactory extends Factory
{
    protected $model = DoctorEspecialidad::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //'doctor_id' => Doctor::all()->random()->id,
            'especialidad_id' => Especialidad::all()->random()->id,
        ];
    }
}
