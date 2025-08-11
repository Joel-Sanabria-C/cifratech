@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Informar un problema</h1>
    <form action="{{ route('usuario.tickets.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="titulo">Título del problema</label>
            <input type="text" name="titulo" id="titulo" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control" rows="5" required></textarea>
        </div>
        <div class="form-group">
            <label for="categoria_id">Categoría</label>
            <select name="categoria_id" id="categoria_id" class="form-control" required>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                @endforeach
            </select>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Crear Ticket</button>
    </form>
</div>
@endsection