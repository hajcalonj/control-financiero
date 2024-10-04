<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoMovimiento extends Model
{
    use HasFactory;

    // Definir el nombre de la tabla (opcional si sigue la convención de nombre plural)
    protected $table = 'tipo_movimiento';

    // Definir los campos que se pueden asignar masivamente
    protected $fillable = [
        'descripcion',
        'signo',
    ];

    // Relación uno a muchos con DetalleProyeccion (opcional)
    public function detalles()
    {
        return $this->hasMany(DetalleProyeccion::class, 'id_movimiento');
    }
}
