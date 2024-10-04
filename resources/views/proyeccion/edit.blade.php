@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('proyeccion.update', $proyeccion->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="mes">Mes</label>
                        <select class="form-control" id="mes" name="mes" required>
                            <option value="">Seleccionar Mes</option>
                            <option value="1" {{ 1 == $proyeccion->mes ? 'selected' : '' }}>Enero</option>
                            <option value="2" {{ 2 == $proyeccion->mes ? 'selected' : '' }}>Febrero</option>
                            <option value="3" {{ 3 == $proyeccion->mes ? 'selected' : '' }}>Marzo</option>
                            <option value="4" {{ 4 == $proyeccion->mes ? 'selected' : '' }}>Abril</option>
                            <option value="5" {{ 5 == $proyeccion->mes ? 'selected' : '' }}>Mayo</option>
                            <option value="6" {{ 6 == $proyeccion->mes ? 'selected' : '' }}>Junio</option>
                            <option value="7" {{ 7 == $proyeccion->mes ? 'selected' : '' }}>Julio</option>
                            <option value="8" {{ 8 == $proyeccion->mes ? 'selected' : '' }}>Agosto</option>
                            <option value="9" {{ 9 == $proyeccion->mes ? 'selected' : '' }}>Septiembre</option>
                            <option value="10" {{ 10 == $proyeccion->mes ? 'selected' : '' }}>Octubre</option>
                            <option value="11" {{ 11 == $proyeccion->mes ? 'selected' : '' }}>Noviembre</option>
                            <option value="12" {{ 12 == $proyeccion->mes ? 'selected' : '' }}>Diciembre</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="comentario">Comentario</label>
                        <input type="text" class="form-control" id="comentario" name="comentario" maxlength="255" value="{{ old('comentario', $proyeccion->comentario) }}">
                    </div>

                    <div class="form-group">
                        <label for="CambioUSD">Cambio USD</label>
                        <input type="number" step="0.001" class="form-control" id="CambioUSD" name="CambioUSD" required value="{{ old('CambioUSD', $proyeccion->CambioUSD) }}">
                    </div>

                    <div class="form-group">
                        <label for="CambioOtro">Cambio Otro</label>
                        <input type="number" step="0.001" class="form-control" id="CambioOtro" name="CambioOtro" required value="{{ old('CambioOtro', $proyeccion->CambioOtro) }}">
                    </div>

                    <hr>

                    <h4>Detalles de la Proyección</h4>
                    <table class="table table-bordered" id="detalles-table">
                        <thead>
                            <tr>
                                <th>Día</th>
                                <th>Motivo</th>
                                <th>ID Movimiento</th>
                                <th>ID Cuenta</th>
                                <th>Moneda</th>
                                <th>Monto</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="detalles-body">
                            @foreach($proyeccion->detalles as $index => $detalle)
                            <tr>
                                <td><input type="number" name="detalles[{{ $index }}][dia]" class="form-control" required value="{{ old('detalles.' . $index . '.dia', $detalle->dia) }}"></td>
                                <td><input type="text" name="detalles[{{ $index }}][motivo]" class="form-control" required value="{{ old('detalles.' . $index . '.motivo', $detalle->motivo) }}"></td>
                                <td>
                                    <select name="detalles[{{ $index }}][id_movimiento]" class="form-control" required>
                                        <option value="" disabled>Seleccione Movimiento</option>
                                        @foreach($movimientos as $movimiento)
                                        <option value="{{ $movimiento->id }}" {{ $movimiento->id == $detalle->id_movimiento ? 'selected' : '' }}>
                                            {{ $movimiento->descripcion }}
                                        </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="detalles[{{ $index }}][id_cuenta]" class="form-control" required>
                                        <option value="" disabled>Seleccione Cuenta</option>
                                        @foreach($cuentas as $cuenta)
                                        <option value="{{ $cuenta->id }}" {{ $cuenta->id == $detalle->id_cuenta ? 'selected' : '' }}>
                                            {{ $cuenta->descripcion }}
                                        </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="detalles[{{ $index }}][Moneda]" class="form-control" required>
                                        <option value="QTZ" {{ $detalle->Moneda == 'QTZ' ? 'selected' : '' }}>QTZ</option>
                                        <option value="USD" {{ $detalle->Moneda == 'USD' ? 'selected' : '' }}>USD</option>
                                        <option value="MXC" {{ $detalle->Moneda == 'MXC' ? 'selected' : '' }}>MXC</option>
                                    </select>
                                </td>
                                <td><input type="number" step="0.01" name="detalles[{{ $index }}][Monto]" class="form-control" required value="{{ old('detalles.' . $index . '.Monto', $detalle->Monto) }}"></td>
                                <td><button type="button" class="btn btn-danger remove-detail">Eliminar</button></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <button type="button" class="btn btn-primary" id="add-detail">Agregar Detalle</button>

                    <br><br>

                    <button type="submit" class="btn btn-success">Actualizar Proyección</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Script para agregar y eliminar detalles dinámicos -->
<script>
    let detalleIndex = {
        {
            count($proyeccion - > detalles)
        }
    };

    document.getElementById('add-detail').addEventListener('click', function() {
        let detallesBody = document.getElementById('detalles-body');
        let newRow = document.createElement('tr');

        newRow.innerHTML = `
            <td><input type="number" name="detalles[${detalleIndex}][dia]" class="form-control" required></td>
            <td><input type="text" name="detalles[${detalleIndex}][motivo]" class="form-control" required></td>
            <td>
                <select name="detalles[${detalleIndex}][id_movimiento]" class="form-control" required>
                    <option value="" disabled selected>Seleccione Movimiento</option>
                    @foreach($movimientos as $movimiento)
                        <option value="{{ $movimiento->id }}">{{ $movimiento->descripcion }}</option>
                    @endforeach
                </select>
            </td>
            <td>
                <select name="detalles[${detalleIndex}][id_cuenta]" class="form-control" required>
                    <option value="" disabled selected>Seleccione Cuenta</option>
                    @foreach($cuentas as $cuenta)
                        <option value="{{ $cuenta->id }}">{{ $cuenta->descripcion }}</option>
                    @endforeach
                </select>
            </td>
            <td>
                <select name="detalles[${detalleIndex}][Moneda]" class="form-control" required>
                    <option value="QTZ">QTZ</option>
                    <option value="USD">USD</option>
                    <option value="MXC">MXC</option>
                </select>
            </td>
            <td><input type="number" step="0.01" name="detalles[${detalleIndex}][Monto]" class="form-control" required></td>
            <td><button type="button" class="btn btn-danger remove-detail">Eliminar</button></td>
        `;

        detallesBody.appendChild(newRow);
        detalleIndex++;
    });

    document.getElementById('detalles-body').addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-detail')) {
            e.target.closest('tr').remove();
        }
    });
</script>
@endsection