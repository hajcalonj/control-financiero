@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-body">
                <!-- Agregar botón para crear nueva proyección -->
                <div class="mb-4">
                    <a href="{{ route('proyeccion.create') }}" class="btn btn-primary">
                        Crear Nueva Proyección
                    </a>
                </div>

                <table class="table table-striped table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Mes</th>
                            <th>ID Usuario</th>
                            <th>Comentario</th>
                            <th>Cambio USD</th>
                            <th>Cambio Otro</th>
                            <th>Total</th>
                            <th>Entrada</th>
                            <th>Salida</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($proyeccion as $proyeccion)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $proyeccion->mes }}</td>
                            <td>{{ $proyeccion->id_usuario }}</td>
                            <td>{{ $proyeccion->comentario }}</td>
                            <td>{{ $proyeccion->CambioUSD }}</td>
                            <td>{{ $proyeccion->CambioOtro }}</td>
                            <td>{{ $proyeccion->Total }}</td>
                            <td>{{ $proyeccion->Entrada }}</td>
                            <td>{{ $proyeccion->Salida }}</td>
                            <td>
                                <a href="{{ route('proyeccion.show', $proyeccion->id) }}" class="btn btn-info btn-sm">Ver</a>
                                <a href="{{ route('proyeccion.edit', $proyeccion->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('proyeccion.destroy', $proyeccion->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta proyección?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection