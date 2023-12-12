<?php

namespace Database\Factories;

use App\Models\Doctor;
use App\Models\DoctorEspecialidad;
use App\Models\DoctorHospital;
use App\Models\Especialidad;
use App\Models\Hospital;
use Illuminate\Database\Eloquent\Factories\Factory;

class DoctorHospitalFactory extends Factory
{
    protected $model = DoctorHospital::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'doctor_id' => Doctor::all()->random()->id,
            'hospital_id' => Hospital::all()->random()->id,
        ];
    }
}

