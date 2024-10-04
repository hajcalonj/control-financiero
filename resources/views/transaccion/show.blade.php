@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            Transacción ID: {{ $transaccion->id_transaccion }}
        </div>
        <div class="card-body">
            <p><strong>Proyección ID:</strong> {{ $transaccion->id_proyeccion }}</p>
            <p><strong>Día:</strong> {{ $transaccion->dia }}</p>
            <p><strong>Motivo:</strong> {{ $transaccion->motivo }}</p>
            <p><strong>Movimiento:</strong> {{ $transaccion->movimiento->descripcion }}</p>
            <p><strong>Cuenta:</strong> {{ $transaccion->cuenta->descripcion }}</p>
            <p><strong>Moneda:</strong> {{ $transaccion->Moneda }}</p>
            <p><strong>Monto:</strong> {{ number_format($transaccion->Monto, 2) }}</p>
            <p><strong>Fecha Real:</strong> {{ \Carbon\Carbon::parse($transaccion->fecha_real)->format('d/m/Y') }}</p>
        </div>
    </div>

    <a href="{{ route('transaccion.index') }}" class="btn btn-secondary mt-3">Volver</a>
</div>
@endsection