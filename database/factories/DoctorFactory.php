<?php

namespace Database\Factories;

use App\Models\Doctor;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
{
    protected $model = Doctor::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $idiomas = ['Ingles', 'Español', 'Frances', 'Italiano'];
        $enfoques = ['Adultos Mayores', 'Adultos Jovenes', 'Niños', 'Cancer', 'Cuidados Paleativos', 'Salud Mental', 'Nutrición'];
        $enfoques_arr = $this->arrayData($enfoques, 2, 3);
        $idiomas_arr = $this->arrayData($idiomas, 1, 3);

        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'tipo_usuario' => 'doctor',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'remember_token' => Str::random(10),
            'profile_photo_path' => null,
            'current_team_id' => null,
            'enfoque' => implode(" / ", $enfoques_arr),
            'idiomas' => implode(" / ", $idiomas_arr),
            'facebook' => $this->faker->boolean ? 'https://facebook.com' : null,
            'instagram' => $this->faker->boolean ? 'https://instagram.com' : null,
            'website' => $this->faker->boolean ? 'https://citavital' : null,
        ];
    }

    public function arrayData($arr, $min, $max)
    {
        $indexes = [];
        $total = rand($min, $max);
        $keys = array_rand($arr, $total);

        if (!is_array($keys))
        {
            return [$arr[$keys]];
        }

        foreach ($keys as $key)
        {
            $indexes[] = $arr[$key];
        }

        return $indexes;
    }
}
