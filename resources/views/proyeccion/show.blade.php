@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h4 class="m-0 font-weight-bold text-primary">Detalles de la Proyección</h4>
            </div>
            <div class="card-body">
                <h5>Mes: {{ $proyeccion->mes }}</h5>
                <p>Comentario: {{ $proyeccion->comentario ?? 'Sin comentarios' }}</p>
                <p>Cambio USD: {{ $proyeccion->CambioUSD }}</p>
                <p>Cambio Otro: {{ $proyeccion->CambioOtro }}</p>
                <p>Total Entrada: {{ $proyeccion->Entrada }}</p>
                <p>Total Salida: {{ $proyeccion->Salida }}</p>

                <hr>

                <h4>Detalles</h4>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Día</th>
                            <th>Motivo</th>
                            <th>Movimiento</th>
                            <th>Cuenta</th>
                            <th>Moneda</th>
                            <th>Monto</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($proyeccion->detalles as $detalle)
                        <tr>
                            <td>{{ $detalle->dia }}</td>
                            <td>{{ $detalle->motivo }}</td>
                            <td>{{ $detalle->movimiento->descripcion ?? 'N/A' }}</td> <!-- Movimiento relacionado -->
                            <td>{{ $detalle->cuenta->descripcion ?? 'N/A' }}</td> <!-- Cuenta relacionada -->
                            <td>{{ $detalle->Moneda }}</td>
                            <td>{{ $detalle->Monto }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <a href="{{ route('proyeccion.index') }}" class="btn btn-primary mt-3">Volver a la lista</a>
            </div>
        </div>
    </div>
</div>
@endsection