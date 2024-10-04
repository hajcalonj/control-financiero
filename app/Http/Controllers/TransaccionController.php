<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use App\Models\Transaccion;
use Illuminate\Http\Request;
use App\Models\TipoMovimiento;
use App\Models\TipoCuenta;
use App\Models\Proyeccion;

class TransaccionController extends Controller
{
    public function index()
    {
        $transacciones = Transaccion::all();
        return view('transaccion.index', compact('transacciones'));
    }

    public function create()
    {
        // Traer todas las proyecciones, tipos de movimiento y cuentas
        $proyecciones = Proyeccion::all();
        $movimientos = TipoMovimiento::all();
        $cuentas = TipoCuenta::all();

        return view('transaccion.create', compact('proyecciones', 'movimientos', 'cuentas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_proyeccion' => 'required',
            'dia' => 'required|integer',
            'motivo' => 'required|string|max:255',
            'id_movimiento' => 'required',
            'id_cuenta' => 'required',
            'Moneda' => 'required|string|max:3',
            'Monto' => 'required|numeric|between:0,9999.99',
        ]);

        DB::beginTransaction();
        try {
            // Obtener la proyección seleccionada
            $proyeccion = Proyeccion::findOrFail($validated['id_proyeccion']);

            // Crear la fecha real usando el día, mes y año de la proyección
            $fecha_real = \Carbon\Carbon::createFromDate($proyeccion->anio, $proyeccion->mes, $validated['dia']);

            // Agregar 'fecha_real' a los datos de la transacción
            $validated['fecha_real'] = $fecha_real;

            Transaccion::create($validated);
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->route('transaccion.create')->with('error', 'Error al crear la transacción. Inténtalo de nuevo.');
        }
        DB::commit();
        return redirect()->route('transaccion.index')->with('success', 'Transacción creada exitosamente.');
    }



    public function show($id)
    {
        // Obtener la transacción específica
        $transaccion = Transaccion::findOrFail($id);

        // Retornar la vista 'show' con los datos de la transacción
        return view('transaccion.show', compact('transaccion'));
    }

    public function edit($id)
    {
        // Obtener la transacción específica
        $transaccion = Transaccion::findOrFail($id);

        // Traer todas las proyecciones, tipos de movimiento y cuentas
        $proyecciones = Proyeccion::all();
        $movimientos = TipoMovimiento::all();
        $cuentas = TipoCuenta::all();

        // Pasar los datos a la vista
        return view('transaccion.edit', compact('transaccion', 'proyecciones', 'movimientos', 'cuentas'));
    }


    public function update(Request $request, $id)
    {
        // Validar los datos del formulario sin la regla "exists"
        $request->validate([
            'id_proyeccion' => 'required|integer',
            'dia' => 'required|integer|min:1|max:31',
            'motivo' => 'required|string|max:255',
            'id_movimiento' => 'required|integer',
            'id_cuenta' => 'required|integer',
            'Moneda' => 'required|string|in:QTZ,USD,MXC',
            'Monto' => 'required|numeric|min:0', // Asegura que el monto sea un número
        ]);

        // Encontrar la transacción a actualizar
        $transaccion = Transaccion::findOrFail($id);

        // Actualizar los campos con los datos del formulario
        $transaccion->id_proyeccion = $request->id_proyeccion;
        $transaccion->dia = $request->dia;
        $transaccion->motivo = $request->motivo;
        $transaccion->id_movimiento = $request->id_movimiento;
        $transaccion->id_cuenta = $request->id_cuenta;
        $transaccion->Moneda = $request->Moneda;
        $transaccion->Monto = $request->Monto;

        // Guardar los cambios en la base de datos
        $transaccion->save();

        // Redirigir con un mensaje de éxito
        return redirect()->route('transaccion.index')->with('success', 'Transacción actualizada exitosamente.');
    }


    public function destroy($id)
    {
        // Eliminar una transacción específica
    }
}
