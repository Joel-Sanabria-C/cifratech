@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="mb-4">Gestión de Solicitudes de Soporte</h1>
        
        <div class="row mb-5">
            <div class="col-12">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Buscar Soluciones, Plantillas de solicitud, Solicitudes o Anuncios" aria-label="Buscar">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card text-white bg-danger mb-3 shadow">
                    <div class="card-body">
                        <h4 class="card-title"><i class="fas fa-exclamation-triangle me-2"></i> Tengo un problema</h4>
                        <p class="card-text">Si necesitas informar de un incidente o error.</p>
                        <a href="{{ route('usuario.tickets.create') }}" class="btn btn-light mt-3">Informar un problema</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-white bg-success mb-3 shadow">
                    <div class="card-body">
                        <h4 class="card-title"><i class="fas fa-plus-circle me-2"></i> Necesito algo nuevo</h4>
                        <p class="card-text">Para solicitar un nuevo servicio o recurso.</p>
                        <a href="{{ route('usuario.tickets.create') }}" class="btn btn-light mt-3">Solicitar un servicio</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3 shadow">
                    <div class="card-body">
                        <h4 class="card-title"><i class="fas fa-lightbulb me-2"></i> Estoy buscando soluciones</h4>
                        <p class="card-text">Explora nuestra base de conocimientos.</p>
                        <a href="{{ route('usuario.tickets.create') }}" class="btn btn-light mt-3">Ver soluciones</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection