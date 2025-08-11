@extends('layouts.adminapp')

@section('content')
    <div class="container">
        <h1>Dashboard de Administrador</h1>
        <h2>Todos los Tickets</h2>

        @if(count($tickets) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Id.</th>
                        <th>Asunto</th>
                        <th>Nombre del solicitante</th>
                        <th>Técnico</th>
                        <th>Fecha de vencimiento</th>
                        <th>Estado</th>
                        <th>Fecha de creación</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tickets as $ticket)
                        <tr>
                            <td>{{ $ticket->id }}</td>
                            <td>{{ $ticket->titulo }}</td>
                            <td>{{ $ticket->usuario->nombre }}</td> {{-- Asumiendo una relación en el modelo --}}
                            <td>{{ $ticket->tecnico->nombre ?? 'N/A' }}</td> {{-- Asumiendo una relación en el modelo --}}
                            <td>{{ $ticket->fecha_vencimiento }}</td>
                            <td>{{ $ticket->estado }}</td>
                            <td>{{ $ticket->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No hay tickets para mostrar.</p>
        @endif
    </div>
@endsection