<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Transaccion extends Model
{
    use HasFactory;

    protected $table = 'transacciones';
    protected $primaryKey = 'id_transaccion';
    public $timestamps = true;
    protected $fillable = [
        'id_proyeccion',
        'dia',
        'motivo',
        'id_movimiento',
        'id_cuenta',
        'Moneda',
        'Monto',
        'fecha_real',
    ];

    public function proyeccion()
    {
        return $this->belongsTo(Proyeccion::class, 'id_proyeccion');
    }

    public function movimiento()
    {
        return $this->belongsTo(TipoMovimiento::class, 'id_movimiento');
    }

    public function cuenta()
    {
        return $this->belongsTo(TipoCuenta::class, 'id_cuenta');
    }
}
