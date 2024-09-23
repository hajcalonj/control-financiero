<?php

namespace App\Http\Controllers;

use App\Models\Proyeccion;
use App\Models\DetalleProyeccion;
use App\Models\TipoMovimiento;
use App\Models\TipoCuenta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProyeccionController extends Controller
{
    public function index()
    {
        $proyeccion = Proyeccion::all();
        return view('proyeccion.index', compact('proyeccion'));
    }

    public function create()
    {
        $movimientos = TipoMovimiento::all(); // Asumiendo que tienes un modelo Movimiento
        $cuentas = TipoCuenta::all(); // Asumiendo que tienes un modelo Cuenta

        return view('proyeccion.create', compact('movimientos', 'cuentas'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'mes' => 'required|integer',
            'comentario' => 'nullable|string|max:255',
            'CambioUSD' => 'required|numeric|between:0,9999.999',
            'CambioOtro' => 'required|numeric|between:0,9999.999',
        ]);

        DB::beginTransaction();

        try {
            $validated['id_usuario'] = Auth::user()->id;

            $total = 0.00;
            $entrada = 0.00;
            $salida = 0.00;

            foreach ($request->detalles as $detalle) {
                if ($detalle['id_movimiento'] == 1) {
                    $entrada += $detalle['Monto'];
                } elseif ($detalle['id_movimiento'] == 2) {
                    $salida += $detalle['Monto'];
                }
            }


            $total = $entrada - $salida;
            $validated['Total'] = $total;
            $validated['Entrada'] = $entrada;
            $validated['Salida'] = $salida;


            $proyeccion = Proyeccion::create($validated);
            foreach ($request->detalles as $detalle) {
                $validaDetalle = [
                    'id_proyeccion' => $proyeccion->id,
                    'dia' => $detalle['dia'],
                    'motivo' => $detalle['motivo'],
                    'id_movimiento' => $detalle['id_movimiento'],
                    'id_cuenta' => $detalle['id_cuenta'],
                    'Moneda' => $detalle['Moneda'],
                    'Monto' => $detalle['Monto'],
                ];
                DetalleProyeccion::create($validaDetalle);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('proyeccion.index')->with('error', 'Error al crear la proyección. Datos no insertados correctamente.');
        }
        DB::commit();
        return redirect()->route('proyeccion.index')->with('success', 'Proyección creada exitosamente.');
    }

    public function show($id)
    {
        $proyeccion = Proyeccion::with(['detalles', 'detalles.movimiento', 'detalles.cuenta'])->findOrFail($id);

        return view('proyeccion.show', compact('proyeccion'));
    }

    public function edit($id)
    {
        $proyeccion = Proyeccion::with('detalles')->findOrFail($id);

        $movimientos = TipoMovimiento::all();
        $cuentas = TipoCuenta::all();

        return view('proyeccion.edit', compact('proyeccion', 'movimientos', 'cuentas'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'mes' => 'required|integer',
            'comentario' => 'nullable|string|max:255',
            'CambioUSD' => 'required|numeric|between:0,9999.999',
            'CambioOtro' => 'required|numeric|between:0,9999.999',
        ]);

        DB::beginTransaction();

        try {
            // Obtener la proyección existente
            $proyeccion = Proyeccion::findOrFail($id);

            // Calcular el total, entrada y salida a partir de los detalles
            $total = 0.00;
            $entrada = 0.00;
            $salida = 0.00;

            foreach ($request->detalles as $detalle) {
                if ($detalle['id_movimiento'] == 1) {
                    $entrada += $detalle['Monto'];
                } elseif ($detalle['id_movimiento'] == 2) {
                    $salida += $detalle['Monto'];
                }
            }

            $total = $entrada - $salida;

            // Actualizar los datos de la proyección
            $validated['Total'] = $total;
            $validated['Entrada'] = $entrada;
            $validated['Salida'] = $salida;

            $proyeccion->update($validated);

            // Eliminar los detalles anteriores
            DetalleProyeccion::where('id_proyeccion', $proyeccion->id)->delete();

            // Insertar los nuevos detalles
            foreach ($request->detalles as $detalle) {
                $detalle['id_proyeccion'] = $proyeccion->id;
                DetalleProyeccion::create($detalle);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('proyeccion.index')->with('error', 'Error al actualizar la proyección. Datos no actualizados correctamente.');
        }

        DB::commit();
        return redirect()->route('proyeccion.index')->with('success', 'Proyección actualizada exitosamente.');
    }


    public function destroy($id)
    {
        $proyeccion = Proyeccion::findOrFail($id);
        DB::beginTransaction();

        try {
            DetalleProyeccion::where('id_proyeccion', $proyeccion->id)->delete();

            $proyeccion->delete();

            DB::commit();

            return redirect()->route('proyeccion.index')->with('success', 'Proyección eliminada exitosamente.');
        } catch (\Exception $e) {
            // Revertir la transacción en caso de error
            DB::rollBack();
            return redirect()->route('proyeccion.index')->with('error', 'Error al eliminar la proyección. Inténtalo de nuevo.');
        }
    }
}
