<?php


use App\Http\Controllers\GinecologoController;
use App\Http\Controllers\PacienteController;

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerificationController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('pruebas');
});

// Rutas de autenticación
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Otras rutas de autenticación como registro, restablecimiento de contraseña, etc.

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


// Route::resource('ginecologos', GinecologosController::class);

// **Breakdown:**
Route::get('ginecologos', [App\Http\Controllers\GinecologoController::class, 'index'])->name('ginecologos.index');

//Route::post('ginecologos', [GinecologoController::class, 'store'])->name('ginecologos.store');
//Route::get('ginecologos/{ginecologo}', [GinecologoController::class, 'show'])->name('ginecologos.show');
//Route::get('ginecologos/{ginecologo}/edit', [GinecologoController::class, 'edit'])->name('ginecologos.edit');
//Route::put('ginecologos/{ginecologo}', [GinecologoController::class, 'update'])->name('ginecologos.update');
//Route::delete('ginecologos/{ginecologo}', [GinecologoController::class, 'destroy'])->name('ginecologos.destroy');


// Ruta para mostrar el listado de pacientes
Route::get('pacientes', [PacienteController::class, 'index'])->name('pacientes.index');

// Ruta para mostrar el formulario de creación de paciente
Route::get('pacientes/create', [PacienteController::class, 'create'])->name('pacientes.create');

// Ruta para almacenar un nuevo paciente en la base de datos
Route::post('pacientes', [PacienteController::class, 'store'])->name('pacientes.store');

// Ruta para mostrar los detalles de un paciente específico
Route::get('pacientes/{paciente}', [PacienteController::class, 'show'])->name('pacientes.show');

// Ruta para mostrar el formulario de edición de un paciente
Route::get('pacientes/{paciente}/edit', [PacienteController::class, 'edit'])->name('pacientes.edit');

// Ruta para actualizar los detalles de un paciente en la base de datos
Route::put('pacientes/{paciente}', [PacienteController::class, 'update'])->name('pacientes.update');

// Ruta para eliminar un paciente de la base de datos
Route::delete('pacientes/{paciente}', [PacienteController::class, 'destroy'])->name('pacientes.destroy');




require __DIR__.'/auth.php';
