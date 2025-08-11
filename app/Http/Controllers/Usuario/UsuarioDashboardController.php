<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ticket;

class UsuarioDashboardController extends Controller
{
    public function index()
    {
        return view('usuario.dashboard');
    }
    public function viewtickets()
    {
       
        $usuarioId = Auth::id();

        // Obtiene solo los tickets asignados a ese isiario
        $tickets = Ticket::where('usuario_id', $usuarioId)
                       ->with(['usuario'])
                       ->get();

        // Pasa los tickets a la vista
        return view('usuario.viewtickets', compact('tickets'));
    }
}