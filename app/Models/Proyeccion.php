<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyeccion extends Model
{
    use HasFactory;

    protected $table = 'proyeccion';

    // Definir los campos que se pueden asignar masivamente
    protected $fillable = [
        'mes',
        'id_usuario',
        'comentario',
        'CambioUSD',
        'CambioOtro',
        'Total',
        'Entrada',
        'Salida'
    ];

    // Relación inversa con el modelo User
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    // Relación uno a muchos con el modelo DetalleProyeccion
    public function detalles()
    {
        return $this->hasMany(DetalleProyeccion::class, 'id_proyeccion');
    }
}
