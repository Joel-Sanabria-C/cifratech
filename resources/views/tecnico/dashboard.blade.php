@extends('layouts.tecnicoapp')

@section('content')
    <div class="container">
        <h1>Dashboard de Técnico</h1>
        <h2>Mis Tickets Asignados</h2>

        @if(count($tickets) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Id.</th>
                        <th>Asunto</th>
                        <th>Nombre del solicitante</th>
                        <th>Fecha de vencimiento</th>
                        <th>Estado</th>
                        <th>Prioridad</th>
                        <th>Fecha de creación</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tickets as $ticket)
                        <tr>
                            <td>{{ $ticket->id }}</td>
                            <td>{{ $ticket->titulo }}</td>
                            <td>{{ $ticket->usuario->nombre }}</td>
                            <td>{{ $ticket->fecha_vencimiento }}</td>
                            <td>{{ $ticket->estado }}</td>
                            <td>{{ $ticket->prioridad }}</td>
                            <td>{{ $ticket->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No tienes tickets asignados para mostrar.</p>
        @endif
    </div>
@endsection