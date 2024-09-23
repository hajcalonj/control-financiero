@extends('layouts.app')

@section('content')
<div class="container">

    <form action="{{ route('transaccion.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="id_proyeccion">Proyección</label>
            <select class="form-control" id="id_proyeccion" name="id_proyeccion" required>
                <option value="">Seleccionar Proyección</option>
                @foreach($proyecciones as $proyeccion)
                <option value="{{ $proyeccion->id }}">
                    Proyección ID: {{ $proyeccion->id }} ({{ $proyeccion->comentario }}) -
                    Usuario: {{ $proyeccion->usuario->name }} -
                    Mes: {{ DateTime::createFromFormat('!m', $proyeccion->mes)->format('F') }}
                </option>
                @endforeach
            </select>
        </div>


        <div class="form-group">
            <label for="dia">Día</label>
            <input type="number" class="form-control" id="dia" name="dia" required>
        </div>

        <div class="form-group">
            <label for="motivo">Motivo</label>
            <input type="text" class="form-control" id="motivo" name="motivo" required>
        </div>

        <div class="form-group">
            <label for="id_movimiento">Tipo de Movimiento</label>
            <select class="form-control" id="id_movimiento" name="id_movimiento" required>
                <option value="">Seleccionar Tipo de Movimiento</option>
                @foreach($movimientos as $movimiento)
                <option value="{{ $movimiento->id }}">{{ $movimiento->descripcion }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="id_cuenta">Tipo de Cuenta</label>
            <select class="form-control" id="id_cuenta" name="id_cuenta" required>
                <option value="">Seleccionar Tipo de Cuenta</option>
                @foreach($cuentas as $cuenta)
                <option value="{{ $cuenta->id }}">{{ $cuenta->descripcion }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="Moneda">Moneda</label>
            <select class="form-control" id="Moneda" name="Moneda" required>
                <option value="QTZ" selected>QTZ</option>
                <option value="USD">USD</option>
                <option value="MXC">MXC</option>
            </select>
        </div>


        <div class="form-group">
            <label for="Monto">Monto</label>
            <input type="number" class="form-control" id="Monto" name="Monto" step="0.01" required>
        </div>

        <button type="submit" class="btn btn-primary">Crear Transacción</button>
    </form>
</div>
@endsection