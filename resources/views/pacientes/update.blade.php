@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Paciente</h1>
        <form action="{{ route('pacientes.update', $paciente->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $paciente->nombre }}" required>
            </div>
            <!-- Agrega aquí los campos adicionales que necesites -->
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>
@endsection
