<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyeccion;
use App\Models\Transaccion;
use Carbon\Carbon;

class ReporteController extends Controller
{
    public function index()
    {
        $currentYear = Carbon::now()->year;

        $totalProyecciones = Proyeccion::whereYear('created_at', $currentYear)->count();

        $transacciones = Transaccion::whereHas('proyeccion', function ($query) use ($currentYear) {
            $query->whereYear('created_at', $currentYear);
        })->get();

        $totalTransacciones = $transacciones->count();

        $totalDetallesProyecciones = Proyeccion::withCount('detalles')
            ->whereYear('created_at', $currentYear)
            ->get()
            ->sum('detalles_count');


        $entradasProyecciones = Proyeccion::whereYear('created_at', $currentYear)
            ->orderBy('created_at')
            ->pluck('Entrada');

        $salidasProyecciones = Proyeccion::whereYear('created_at', $currentYear)
            ->orderBy('created_at')
            ->pluck('Salida');

        $totalEntradasProyecciones = Proyeccion::whereYear('created_at', $currentYear)
            ->sum('Entrada');

        $totalSalidasProyecciones = Proyeccion::whereYear('created_at', $currentYear)
            ->sum('Salida');

        $totalEntradasTransacciones = $transacciones->where('id_movimiento', 1)->sum('Monto');

        $totalSalidasTransacciones = $transacciones->where('id_movimiento', 2)->sum('Monto');

        return view('reportes.index', [
            'totalProyecciones' => $totalProyecciones,
            'totalTransacciones' => $totalTransacciones,
            'totalDetallesProyecciones' => $totalDetallesProyecciones,
            'entradasProyecciones' => $entradasProyecciones,
            'salidasProyecciones' => $salidasProyecciones,
            'totalEntradasProyecciones' => $totalEntradasProyecciones,
            'totalSalidasProyecciones' => $totalSalidasProyecciones,
            'totalEntradasTransacciones' => $totalEntradasTransacciones,
            'totalSalidasTransacciones' => $totalSalidasTransacciones,
        ]);
    }
}
