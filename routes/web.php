<?php

use App\Http\Controllers\CitaController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\EspecialidadController;
use App\Http\Controllers\ExamenController;
use App\Http\Controllers\HistorialController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\MedicamentoController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\PacienteController;
use App\Models\Doctor;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('home');

Route::get('/contacto', [ContactoController::class, 'index'])->name('contacto.index');
Route::post('/contacto/mail', [ContactoController::class, 'email'])->name('contacto.mail');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::prefix('app')->group(function () {

        Route::get(
            'hospitales/{hospital}/doctores/{doctor}/agendar/{fecha}',
            [DoctorController::class, 'agendar'])
            ->name('doctores.agendar');

        Route::get('hospitales', [HospitalController::class, 'index'])->name('hospitales.index');

        Route::get('especialidades', [EspecialidadController::class, 'index'])->name('especialidades.index');

        Route::get('citas/list', [CitaController::class, 'lista'])->name('citas.list');
        Route::resource('citas', CitaController::class);


        Route::post('/pacientes/{paciente}/mensaje', [PacienteController::class, 'email'])->name('pacientes.mensaje');
        Route::get('/pacientes/{paciente}/medicamentos', [MedicamentoController::class, 'lista'])->name('medicamentos.list');
        Route::post('/pacientes/{paciente}/medicamentos', [MedicamentoController::class, 'store'])->name('medicamentos.store');
        Route::get('/pacientes/{paciente}/examenes/{examen}', [ExamenController::class, 'show'])->name('examenes.show');
        Route::get('/pacientes/{paciente}/examenes', [ExamenController::class, 'lista'])->name('examenes.list');
        Route::post('/pacientes/{paciente}/examenes', [ExamenController::class, 'store'])->name('examenes.store');
        Route::get('/pacientes/{paciente}/notas', [NotaController::class, 'lista'])->name('notas.list');
        Route::post('/pacientes/{paciente}/notas', [NotaController::class, 'store'])->name('notas.store');
        Route::resource('pacientes', PacienteController::class);

        Route::get('doctores/list', [DoctorController::class, 'listado'])->name('doctores.list');
        Route::resource('doctores', DoctorController::class);
        Route::resource('historial', HistorialController::class);
    });

    Route::get('/doctores-list', function () {
        return Doctor::select('email', 'name')->get();
    });

});
