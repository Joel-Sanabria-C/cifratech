<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Categoria;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;

class TicketController extends Controller
{
    public function create()
    {
        $categorias = Categoria::all();
        return view('usuario.create', compact('categorias'));
    }
    public function classifyTicket($descripcion)
{
    $client = new Client();
    $response = $client->post('https://api-inference.huggingface.co/models/cardiffnlp/twitter-xlm-roberta-base-sentiment', [
        'headers' => [
            'Authorization' => 'Bearer ' . env('HUGGINGFACE_TOKEN'), // Reemplaza esto
            'Content-Type' => 'application/json',
        ],
        'body' => json_encode(['inputs' => $descripcion]),
    ]);

    $result = json_decode($response->getBody(), true);
    return $result;
}
    
    

    // Método para guardar el nuevo ticket desde el formulario web
    public function store(Request $request)
{
    $request->validate([
        // ... (validaciones)
    ]);

    // Lógica para clasificar la descripción del ticket
    $clasificacion = $this->classifyTicket($request->input('descripcion'));

    // Interpreta el resultado de la IA
    $prioridad = 'baja'; // Por defecto
    if (isset($clasificacion[0][0]['label'])) {
        $etiqueta = $clasificacion[0][0]['label'];

        if ($etiqueta == 'negative') {
            $prioridad = 'alta'; 
        } elseif ($etiqueta == 'neutral') {
            $prioridad = 'media';
        } else {
            // Cualquier otra cosa, como 'positive', se asigna a baja
            $prioridad = 'baja';
        }
    }

    $ticket = new Ticket();
    $ticket->usuario_id = Auth::id();
    $ticket->categoria_id = $request->input('categoria_id');
    $ticket->tecnico_id = null;
    $ticket->titulo = $request->input('titulo');
    $ticket->descripcion = $request->input('descripcion');
    $ticket->estado = 'abierto';
    $ticket->prioridad = $prioridad; // Asigna la prioridad clasificada
    $ticket->fecha_vencimiento = now()->addDays(7);
    $ticket->save();

    return redirect()->route('usuario.dashboard')->with('success', 'El ticket ha sido creado con éxito.');
}
}