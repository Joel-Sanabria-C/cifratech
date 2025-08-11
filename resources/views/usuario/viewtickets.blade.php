@extends('layouts.app')

@section('content')
<div class="container">
    
    @if($tickets->isEmpty())
        <div class="alert alert-info" role="alert">
            Este usuario no tiene tickets registrados.
        </div>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Estado</th>
                    <th>Categoría</th>
                    <th>Técnico Asignado</th>
                    <th>Fecha de Creación</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tickets as $ticket)
                    <tr>
                        <td>{{ $ticket->id }}</td>
                        <td>{{ $ticket->titulo }}</td>
                        <td>{{ $ticket->estado }}</td>
                        <td>{{ $ticket->categoria->nombre }}</td>
                        <td>{{ $ticket->tecnico->nombre ?? 'No asignado' }}</td>
                        <td>{{ $ticket->created_at->format('d/m/Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection