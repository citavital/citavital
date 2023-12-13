<?php

namespace Database\Factories;

use App\Models\DoctorTratamiento;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DoctorTratamiento>
 */
class DoctorTratamientoFactory extends Factory
{
    protected $model = DoctorTratamiento::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //'doctor_id' => Doctor::all()->random()->id,
            'tratamiento' => $this->faker->text(80),
        ];
    }
}
