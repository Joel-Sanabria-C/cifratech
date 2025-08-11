<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ticket;
use Illuminate\Support\Facades\Validator;

class TicketController extends Controller
{
    // Método para mostrar el formulario de creación de ticket
    public function create()
    {
        $categorias = Categoria::all();
        return view('usuario.create', compact('categorias'));
    }

    // Método para guardar el nuevo ticket
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:150',
            'descripcion' => 'required|string',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        $ticket = new Ticket();
        $ticket->usuario_id = Auth::id(); // Asigna el ID del usuario logueado
        $ticket->categoria_id = $request->input('categoria_id');
        $ticket->tecnico_id = null; // Se asignará más tarde
        $ticket->titulo = $request->input('titulo');
        $ticket->descripcion = $request->input('descripcion');
        $ticket->estado = 'abierto';
        $ticket->save();

        return redirect()->route('usuario.dashboard')->with('success', 'El ticket ha sido creado con éxito.');
    }
    // Listar todos los tickets (para administradores)
    public function allTickets()
    {
        $tickets = Ticket::with(['usuario', 'tecnico'])->get();
        return response()->json($tickets);
    }
    
    // Listar tickets creados por el usuario logueado
    public function myTickets()
    {
        $userId = Auth::id();
        $tickets = Ticket::where('usuario_id', $userId)
                         ->with(['tecnico'])
                         ->get();

        return response()->json($tickets);
    }

    // Listar tickets asignados al técnico logueado
    public function assignedTickets()
    {
        $tecnicoId = Auth::id();
        $tickets = Ticket::where('tecnico_id', $tecnicoId)
                         ->with(['usuario'])
                         ->get();

        return response()->json($tickets);
    }
}