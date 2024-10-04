@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('transaccion.update', $transaccion->id_transaccion) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="id_proyeccion">Proyección</label>
            <select class="form-control" id="id_proyeccion" name="id_proyeccion" required>
                <option value="">Seleccionar Proyección</option>
                @foreach($proyecciones as $proyeccion)
                <option value="{{ $proyeccion->id }}" {{ $transaccion->id_proyeccion == $proyeccion->id ? 'selected' : '' }}>
                    Proyección ID: {{ $proyeccion->id }} ({{ $proyeccion->comentario }}) -
                    Usuario: {{ $proyeccion->usuario->name }} -
                    Mes: {{ DateTime::createFromFormat('!m', $proyeccion->mes)->format('F') }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="dia">Día</label>
            <input type="number" class="form-control" id="dia" name="dia" value="{{ $transaccion->dia }}" required>
        </div>

        <div class="form-group">
            <label for="motivo">Motivo</label>
            <input type="text" class="form-control" id="motivo" name="motivo" value="{{ $transaccion->motivo }}" required>
        </div>

        <div class="form-group">
            <label for="id_movimiento">Tipo de Movimiento</label>
            <select class="form-control" id="id_movimiento" name="id_movimiento" required>
                <option value="">Seleccionar Tipo de Movimiento</option>
                @foreach($movimientos as $movimiento)
                <option value="{{ $movimiento->id }}" {{ $transaccion->id_movimiento == $movimiento->id ? 'selected' : '' }}>
                    {{ $movimiento->descripcion }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="id_cuenta">Tipo de Cuenta</label>
            <select class="form-control" id="id_cuenta" name="id_cuenta" required>
                <option value="">Seleccionar Tipo de Cuenta</option>
                @foreach($cuentas as $cuenta)
                <option value="{{ $cuenta->id }}" {{ $transaccion->id_cuenta == $cuenta->id ? 'selected' : '' }}>
                    {{ $cuenta->descripcion }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="Moneda">Moneda</label>
            <select class="form-control" id="Moneda" name="Moneda" required>
                <option value="QTZ" {{ $transaccion->Moneda == 'QTZ' ? 'selected' : '' }}>QTZ</option>
                <option value="USD" {{ $transaccion->Moneda == 'USD' ? 'selected' : '' }}>USD</option>
                <option value="MXC" {{ $transaccion->Moneda == 'MXC' ? 'selected' : '' }}>MXC</option>
            </select>
        </div>

        <div class="form-group">
            <label for="Monto">Monto</label>
            <input type="number" class="form-control" id="Monto" name="Monto" value="{{ $transaccion->Monto }}" step="any" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Transacción</button>
    </form>
</div>
@endsection