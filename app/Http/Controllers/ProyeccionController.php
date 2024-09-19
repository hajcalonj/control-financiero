<?php

namespace App\Http\Controllers;

use App\Models\Proyeccion;
use App\Models\DetalleProyeccion;
use App\Models\TipoMovimiento;
use App\Models\TipoCuenta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'detalles.*.dia' => 'required|integer',
            'detalles.*.motivo' => 'required|string|max:255',
            'detalles.*.id_movimiento' => 'required|integer|in:1,2', // Asegúrate de que el valor sea 1 o 2
            'detalles.*.id_cuenta' => 'required|integer',
            'detalles.*.Moneda' => 'required|string|max:255',
            'detalles.*.Monto' => 'required|numeric|between:0,9999.99',
        ]);

        $validated['id_usuario'] = Auth::user()->id;

        $total = 0;
        $entrada = 0;
        $salida = 0;

        foreach ($request->detalles as $detalle) {
            $total += $detalle['Monto'];

            if ($detalle['id_movimiento'] == 1) {
                // Si id_movimiento es 1 (entrada), sumamos el monto
                $entrada += $detalle['Monto'];
            } elseif ($detalle['id_movimiento'] == 2) {
                // Si id_movimiento es 2 (salida), sumamos el monto
                $salida += $detalle['Monto'];
            }
        }

        // Actualizar los datos validados con los cálculos
        $validated['Total'] = $total;
        $validated['Entrada'] = $entrada;
        $validated['Salida'] = $salida;

        // Crear la proyección (encabezado)
        $proyeccion = Proyeccion::create($validated);

        // Crear los detalles de la proyección
        foreach ($request->detalles as $detalle) {
            $detalle['id_proyeccion'] = $proyeccion->id;
            DetalleProyeccion::create($detalle);
        }

        return redirect()->route('proyeccion.index')->with('success', 'Proyección creada exitosamente.');
    }


    public function show($id)
    {
        // Traer la proyección y sus detalles asociados
        $proyeccion = Proyeccion::with('detalles')->findOrFail($id);
        return view('proyeccion.show', compact('proyeccion'));
    }

    public function edit($id)
    {
        // Traer la proyección y sus detalles para editar
        $proyeccion = Proyeccion::with('detalles')->findOrFail($id);
        return view('proyeccion.edit', compact('proyeccion'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'mes' => 'required|integer',
            'id_usuario' => 'required|integer',
            'comentario' => 'nullable|string|max:255',
            'CambioUSD' => 'required|numeric|between:0,9999.999',
            'CambioOtro' => 'required|numeric|between:0,9999.999',
            'Total' => 'required|numeric|between:0,9999.99',
            'Entrada' => 'required|numeric|between:0,9999.99',
            'Salida' => 'required|numeric|between:0,9999.99',
            'detalles.*.dia' => 'required|integer',
            'detalles.*.motivo' => 'required|string|max:255',
            'detalles.*.id_movimiento' => 'required|integer',
            'detalles.*.id_cuenta' => 'required|integer',
            'detalles.*.Moneda' => 'required|string|max:255',
            'detalles.*.Monto' => 'required|numeric|between:0,9999.99',
        ]);

        // Actualizar la proyección
        $proyeccion = Proyeccion::findOrFail($id);
        $proyeccion->update($validated);

        // Eliminar los detalles anteriores
        DetalleProyeccion::where('id_proyeccion', $proyeccion->id)->delete();

        // Insertar los nuevos detalles
        foreach ($request->detalles as $detalle) {
            $detalle['id_proyeccion'] = $proyeccion->id;
            DetalleProyeccion::create($detalle);
        }

        return redirect()->route('proyeccion.index')->with('success', 'Proyección actualizada exitosamente.');
    }

    public function destroy($id)
    {
        // Eliminar los detalles primero
        $proyeccion = Proyeccion::findOrFail($id);
        DetalleProyeccion::where('id_proyeccion', $proyeccion->id)->delete();

        // Eliminar la proyección
        $proyeccion->delete();

        return redirect()->route('proyeccion.index')->with('success', 'Proyección eliminada exitosamente.');
    }
}
