<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoCuentaYMovimientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insertar registros en la tabla tipo_cuenta
        DB::table('tipo_cuenta')->insert([
            ['descripcion' => 'Crédito'],
            ['descripcion' => 'Contado'],
        ]);

        // Insertar registros en la tabla tipo_movimiento
        DB::table('tipo_movimiento')->insert([
            ['descripcion' => 'Entrada', 'signo' => '+'],
            ['descripcion' => 'Salida', 'signo' => '-'],
        ]);
    }
}
