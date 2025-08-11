<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Obtiene todos los tickets, cargando las relaciones de usuario y técnico
        $tickets = Ticket::with(['usuario', 'tecnico'])->get();
        return view('admin.dashboard', compact('tickets'));
    }

    public function users()
    {
        // ... lógica para obtener y mostrar usuarios
    }
}
