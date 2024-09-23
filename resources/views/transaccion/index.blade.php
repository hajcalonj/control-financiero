@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('transaccion.create') }}" class="btn btn-primary mb-3">Nueva Transacción</a>

    @if($transacciones->isEmpty())
    <div class="alert alert-warning">No hay transacciones registradas.</div>
    @else
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Día</th>
                <th>Motivo</th>
                <th>Movimiento</th>
                <th>Cantidad</th>
                <th>Moneda</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transacciones as $transaccion)
            <tr>
                <td>{{ $transaccion->id_transaccion }}</td>
                <td>{{ $transaccion->dia }}</td>
                <td>{{ $transaccion->motivo }}</td>
                <td>{{ $transaccion->movimiento->nombre }}</td>
                <td>{{ $transaccion->Monto }}</td>
                <td>{{ $transaccion->Moneda }}</td>
                <td>
                    <!-- Botón para Ver los detalles -->
                    <a href="{{ route('transaccion.show', $transaccion->id_transaccion) }}" class="btn btn-info btn-sm">Ver</a>

                    <!-- Botón para Editar -->
                    <a href="{{ route('transaccion.edit', $transaccion->id_transaccion) }}" class="btn btn-warning btn-sm">Editar</a>

                    <!-- Botón para Eliminar -->
                    <form action="{{ route('transaccion.destroy', $transaccion->id_transaccion) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar esta transacción?');">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection