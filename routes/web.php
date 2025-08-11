
<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Tecnico\TecnicoDashboardController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\Usuario\UsuarioDashboardController;


// Nueva ruta para la página de inicio
Route::get('/', function () {
    
    return redirect()->route('login');
});

// Rutas de autenticación
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Grupo de rutas para usuarios autenticados
Route::middleware(['auth'])->group(function () {

    // Rutas para Admin
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard'); 
    Route::get('/admin/usuarios', [AdminDashboardController::class, 'users'])->name('admin.users');
    Route::get('/admin/tickets', [AdminDashboardController::class, 'tickets'])->name('admin.tickets');

    // Rutas para Técnico
    Route::get('/tecnico/dashboard', [TecnicoDashboardController::class, 'index'])->name('tecnico.dashboard');
    Route::get('/tecnico/tickets', [TecnicoDashboardController::class, 'tickets'])->name('tecnico.tickets');

    // Rutas para Usuario
    Route::get('/usuario/dashboard', [UsuarioDashboardController::class, 'index'])->name('usuario.dashboard');
    Route::get('/usuario/tickets', [UsuarioDashboardController::class, 'viewtickets'])->name('usuario.viewtickets');

    // Rutas para el formulario y la creación de tickets
    Route::get('/usuario/tickets/crear', [TicketController::class, 'create'])->name('usuario.tickets.create');
    Route::post('/usuario/tickets', [TicketController::class, 'store'])->name('usuario.tickets.store');
    
});