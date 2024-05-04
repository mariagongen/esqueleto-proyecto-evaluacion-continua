<!-- resources/views/ginecologos/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Listado de Ginecólogos</h1>
        
        @if (count($ginecologos) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Email</th>
                        <th>Número Colegiado</th>
                        <th>Teléfono</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ginecologos as $ginecologo)
                        <tr>
                            <td>{{ $ginecologo->nombre ?? 'null' }}</td>
                            <td>{{ $ginecologo->apellidos ?? 'null' }}</td>
                            <td>{{ $ginecologo->email ?? 'null' }}</td>
                            <td>{{ $ginecologo->numero_colegiado ?? 'null' }}</td>
                            <td>{{ $ginecologo->telefono ?? 'null' }}</td>
                            <td>
                                <a href="{{ route('ginecologos.show', $ginecologo->id) }}">Ver</a> |
                                <a href="{{ route('ginecologos.edit', $ginecologo->id) }}">Editar</a> |
                                <form action="{{ route('ginecologos.destroy', $ginecologo->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $ginecologos->links() }}
        @else
            <p>No hay ginecólogos registrados.</p>
        @endif
    </div>
@endsection
