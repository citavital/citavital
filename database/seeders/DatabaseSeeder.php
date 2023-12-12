<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Doctor;
use App\Models\DoctorEspecialidad;
use App\Models\DoctorHospital;
use App\Models\Especialidad;
use App\Models\Hospital;
use App\Models\User;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->hospitales();
        $this->especialidades();
        $this->addDoctors();
    }

    public function addDoctors()
    {
        Doctor::factory()->count(50)->create();
        DoctorHospital::factory()->count(100)->create();
        DoctorEspecialidad::factory()->count(100)->create();
    }

    public function hospitales()
    {

        $hospitales = [
            [
                'nombre' => 'Pacifica Salud',
                'latitud' => 0,
                'longitud' => 0,
                'telefono_1' => '+507 204-8184',
                'telefono_2' => null,
                'direccion' => 'Boulevard Pacífica y Vía Punta Darién, Ciudad de Panamá, Panamá.',
                'url' => 'https://www.pacificasalud.com/',
            ],
            [
                'nombre' => 'Hospital Santa Fe',
                'latitud' => 0,
                'longitud' => 0,
                'telefono_1' => '+507 360-7400',
                'telefono_2' => null,
                'direccion' => 'Av. Simón Bolívar, Panamá, Provincia de Panamá, Panama',
                'url' => 'https://www.hospitalsantafepanama.com/'
            ],
            [
                'nombre' => 'Hospital San Fernando',
                'latitud' => 0,
                'longitud' => 0,
                'telefono_1' => '+507 305-6300',
                'telefono_2' => '+507 305-6305',
                'direccion' => 'Vía España',
                'url' => 'https://www.hospitalsanfernando.com/en/'
            ],
            [
                'nombre' => 'Minimed',
                'latitud' => 0,
                'longitud' => 0,
                'telefono_1' => '+507 263-6464',
                'telefono_2' => null,
                'direccion' => 'Vía Ricardo J. Alfaro',
                'url' => 'https://minimedpanama.com/'
            ],
            [
                'nombre' => 'Hospital Nacional',
                'latitud' => 0,
                'longitud' => 0,
                'telefono_1' => '+507 306-3300',
                'telefono_2' => null,
                'direccion' => 'Ave.Cuba entre Calle 38 y 39, Ciudad de Panamá',
                'url' => 'https://www.hospitalnacional.com/'
            ],
            [
                'nombre' => 'Hospital Mar del Sur',
                'latitud' => 0,
                'longitud' => 0,
                'telefono_1' => '+507 390-4200',
                'telefono_2' => '+507 302-0230',
                'direccion' => 'Bella Vista, Calle 40 Este, Edificio Clínica Hospital Mar del Sur, Local 1',
                'url' => 'https://www.hospitalmardelsur.com/'
            ],
            [
                'nombre' => 'Hospital Paitilla',
                'latitud' => 0,
                'longitud' => 0,
                'telefono_1' => '+507 265-8800',
                'telefono_2' => '+507 265-8888',
                'direccion' => 'Ave. Balboa y Calle 53 - Paitilla Panamá, República de Panamá',
                'url' => 'https://hospitalpaitilla.com/'
            ],
        ];

        foreach ($hospitales as $hospital) {
            $row = Hospital::where('nombre', $hospital['nombre'])->first();

            if (empty($row)) {
                Hospital::create(array_merge(['id' => Uuid::uuid4()], $hospital));
            }
        }
    }

    public function especialidades()
    {
        $especialidades = ['Alergología',
            'Anestesiología',
            'Angiología',
            'Cardiología',
            'Endocrinología',
            'Estomatología',
            'Farmacología Clínica',
            'Gastroenterología',
            'Genética',
            'Geriatría',
            'Hematología',
            'Hepatología',
            'Infectología',
            'Medicina aeroespacial',
            'Medicina del deporte',
            'Medicina familiar y comunitaria',
            'Medicina física y rehabilitación',
            'Medicina forense',
            'Medicina intensiva',
            'Medicina interna',
            'Medicina preventiva y salud pública',
            'Medicina del trabajo',
            'Nefrología',
            'Neumología',
            'Neurología',
            'Nutriología',
            'Oncología médica',
            'Oncología radioterápica',
            'Pediatría',
            'Psiquiatría',
            'Reumatología',
            'Toxicología'
        ];

        foreach ($especialidades as $especialidad)
        {
            $row = Especialidad::where('nombre', $especialidad)->first();

            if (empty($row))
            {
                Especialidad::create(['nombre' => $especialidad]);
            }
        }
    }
}
