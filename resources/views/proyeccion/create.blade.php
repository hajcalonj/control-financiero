@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('proyeccion.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="mes">Mes</label>
                        <select class="form-control" id="mes" name="mes" required>
                            <option value="">Seleccionar Mes</option>
                            <option value="1">Enero</option>
                            <option value="2">Febrero</option>
                            <option value="3">Marzo</option>
                            <option value="4">Abril</option>
                            <option value="5">Mayo</option>
                            <option value="6">Junio</option>
                            <option value="7">Julio</option>
                            <option value="8">Agosto</option>
                            <option value="9">Septiembre</option>
                            <option value="10">Octubre</option>
                            <option value="11">Noviembre</option>
                            <option value="12">Diciembre</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="comentario">Comentario</label>
                        <input type="text" class="form-control" id="comentario" name="comentario" maxlength="255">
                    </div>

                    <div class="form-group">
                        <label for="CambioUSD">Cambio USD</label>
                        <input type="number" step="0.001" class="form-control" id="CambioUSD" name="CambioUSD" required value="7.91">
                    </div>

                    <div class="form-group">
                        <label for="CambioOtro">Cambio Otro</label>
                        <input type="number" step="0.001" class="form-control" id="CambioOtro" name="CambioOtro" required value="0">
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
                            <tr>
                                <td><input type="number" name="detalles[0][dia]" class="form-control" required></td>
                                <td><input type="text" name="detalles[0][motivo]" class="form-control" required></td>
                                <td>
                                    <select name="detalles[0][id_movimiento]" class="form-control" required>
                                        <option value="" disabled selected>Seleccione Movimiento</option>
                                        @foreach($movimientos as $movimiento)
                                        <option value="{{ $movimiento->id }}">{{ $movimiento->descripcion }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="detalles[0][id_cuenta]" class="form-control" required>
                                        <option value="" disabled selected>Seleccione Cuenta</option>
                                        @foreach($cuentas as $cuenta)
                                        <option value="{{ $cuenta->id }}">{{ $cuenta->descripcion }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="detalles[0][Moneda]" class="form-control" required>
                                        <option value="QTZ" selected>QTZ</option>
                                        <option value="USD">USD</option>
                                        <option value="MXC">MXC</option>
                                    </select>
                                </td>
                                <td><input type="number" step="0.01" name="detalles[0][Monto]" class="form-control" required></td>
                                <td><button type="button" class="btn btn-danger remove-detail">Eliminar</button></td>
                            </tr>
                        </tbody>
                    </table>

                    <button type="button" class="btn btn-primary" id="add-detail">Agregar Detalle</button>

                    <br><br>

                    <button type="submit" class="btn btn-success">Guardar Proyección</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Script para agregar y eliminar detalles dinámicos -->
<script>
    let detalleIndex = 1;

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
                    <option value="QTZ" selected>QTZ</option>
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