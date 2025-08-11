<?php

namespace App\Http\Controllers\Tecnico;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ticket;

class TecnicoDashboardController extends Controller
{
    public function index()
    {
        // Obtiene el ID del técnico que ha iniciado sesión
        $tecnicoId = Auth::id();

        // Obtiene solo los tickets asignados a ese técnico
        $tickets = Ticket::where('tecnico_id', $tecnicoId)
                       ->with(['usuario'])
                       ->get();

        // Pasa los tickets a la vista
        return view('tecnico.dashboard', compact('tickets'));
    }
}