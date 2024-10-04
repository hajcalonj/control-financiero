<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleProyeccion extends Model
{
    use HasFactory;

    // Definir el nombre de la tabla (opcional si sigue la convención de nombre plural)
    protected $table = 'detalle_proyeccion';

    // Definir los campos que se pueden asignar masivamente
    protected $fillable = [
        'id_proyeccion',
        'dia',
        'motivo',
        'id_movimiento',
        'id_cuenta',
        'Moneda',
        'Monto'
    ];

    // Definir la relación inversa con el modelo Proyeccion
    public function proyeccion()
    {
        return $this->belongsTo(Proyeccion::class, 'id_proyeccion');
    }

    // Definir la relación con el modelo Movimiento (opcional)
    public function movimiento()
    {
        return $this->belongsTo(TipoMovimiento::class, 'id_movimiento');
    }

    // Definir la relación con el modelo Cuenta (opcional)
    public function cuenta()
    {
        return $this->belongsTo(TipoCuenta::class, 'id_cuenta');
    }
}
