<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Categoria;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function create()
    {
        $categorias = Categoria::all();
        return view('usuario.create', compact('categorias'));
    }
    
    

    // Método para guardar el nuevo ticket desde el formulario web
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:150',
            'descripcion' => 'required|string',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        $ticket = new Ticket();
        $ticket->usuario_id = Auth::id();
        $ticket->categoria_id = $request->input('categoria_id');
        $ticket->tecnico_id = null;
        $ticket->titulo = $request->input('titulo');
        $ticket->descripcion = $request->input('descripcion');
        $ticket->fecha_vencimiento = now()->addDays(7); // Asigna una fecha de vencimiento por defecto (ej. 7 días a partir de ahora)
        $ticket->save();

        return redirect()->route('usuario.dashboard')->with('success', 'El ticket ha sido creado con éxito.');
    }
}