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
        //DB::table('tipo_cuenta')->insert([
        //    ['descripcion' => 'Crédito'],
        //    ['descripcion' => 'Contado'],
        //]);

        // Insertar registros en la tabla tipo_movimiento
        //DB::table('tipo_movimiento')->insert([
        //    ['descripcion' => 'Entrada', 'signo' => '+'],
        //    ['descripcion' => 'Salida', 'signo' => '-'],
        //]);

        DB::table('transactions')->insert([
            ['id_transaccion' => 7, 'id_proyeccion' => 3, 'dia' => 1, 'motivo' => 'Desayuno 2', 'id_movimiento' => 1, 'id_cuenta' => 1, 'Moneda' => 'QTZ', 'Monto' => 30, 'fecha_real' => '2024-09-28', 'created_at' => '2024-10-25', 'updated_at' => '2024-10-25'],
            ['id_transaccion' => 8, 'id_proyeccion' => 3, 'dia' => 1, 'motivo' => 'Pago Cocinero', 'id_movimiento' => 2, 'id_cuenta' => 1, 'Moneda' => 'QTZ', 'Monto' => 75, 'fecha_real' => '2024-09-28', 'created_at' => '2024-10-25', 'updated_at' => '2024-10-25'],
            ['id_transaccion' => 9, 'id_proyeccion' => 3, 'dia' => 1, 'motivo' => 'Pago Ayudante', 'id_movimiento' => 2, 'id_cuenta' => 1, 'Moneda' => 'QTZ', 'Monto' => 75, 'fecha_real' => '2024-09-28', 'created_at' => '2024-10-25', 'updated_at' => '2024-10-25'],
            ['id_transaccion' => 10, 'id_proyeccion' => 3, 'dia' => 1, 'motivo' => 'Pago Servicio', 'id_movimiento' => 2, 'id_cuenta' => 1, 'Moneda' => 'QTZ', 'Monto' => 75, 'fecha_real' => '2024-09-28', 'created_at' => '2024-10-25', 'updated_at' => '2024-10-25'],
            ['id_transaccion' => 11, 'id_proyeccion' => 3, 'dia' => 1, 'motivo' => 'Desayuno 2', 'id_movimiento' => 1, 'id_cuenta' => 1, 'Moneda' => 'QTZ', 'Monto' => 30, 'fecha_real' => '2024-09-28', 'created_at' => '2024-10-25', 'updated_at' => '2024-10-25'],
            ['id_transaccion' => 12, 'id_proyeccion' => 3, 'dia' => 1, 'motivo' => 'Desayuno 2', 'id_movimiento' => 1, 'id_cuenta' => 1, 'Moneda' => 'QTZ', 'Monto' => 30, 'fecha_real' => '2024-09-28', 'created_at' => '2024-10-25', 'updated_at' => '2024-10-25'],
            ['id_transaccion' => 13, 'id_proyeccion' => 3, 'dia' => 1, 'motivo' => 'Desayuno 2', 'id_movimiento' => 1, 'id_cuenta' => 1, 'Moneda' => 'QTZ', 'Monto' => 30, 'fecha_real' => '2024-09-28', 'created_at' => '2024-10-25', 'updated_at' => '2024-10-25'],
            ['id_transaccion' => 14, 'id_proyeccion' => 3, 'dia' => 1, 'motivo' => 'Menu 1', 'id_movimiento' => 1, 'id_cuenta' => 1, 'Moneda' => 'QTZ', 'Monto' => 35, 'fecha_real' => '2024-09-28', 'created_at' => '2024-10-25', 'updated_at' => '2024-10-25'],
            ['id_transaccion' => 15, 'id_proyeccion' => 3, 'dia' => 1, 'motivo' => 'Menu 1', 'id_movimiento' => 1, 'id_cuenta' => 1, 'Moneda' => 'QTZ', 'Monto' => 35, 'fecha_real' => '2024-09-28', 'created_at' => '2024-10-25', 'updated_at' => '2024-10-25'],
            ['id_transaccion' => 16, 'id_proyeccion' => 3, 'dia' => 1, 'motivo' => 'Menu 1', 'id_movimiento' => 1, 'id_cuenta' => 1, 'Moneda' => 'QTZ', 'Monto' => 35, 'fecha_real' => '2024-09-28', 'created_at' => '2024-10-25', 'updated_at' => '2024-10-25'],
            ['id_transaccion' => 17, 'id_proyeccion' => 3, 'dia' => 1, 'motivo' => 'Menu 1', 'id_movimiento' => 1, 'id_cuenta' => 1, 'Moneda' => 'QTZ', 'Monto' => 35, 'fecha_real' => '2024-09-28', 'created_at' => '2024-10-25', 'updated_at' => '2024-10-25'],
            ['id_transaccion' => 18, 'id_proyeccion' => 3, 'dia' => 1, 'motivo' => 'Menu 1', 'id_movimiento' => 1, 'id_cuenta' => 1, 'Moneda' => 'QTZ', 'Monto' => 35, 'fecha_real' => '2024-09-28', 'created_at' => '2024-10-25', 'updated_at' => '2024-10-25'],
            ['id_transaccion' => 19, 'id_proyeccion' => 3, 'dia' => 1, 'motivo' => 'Menu 2', 'id_movimiento' => 1, 'id_cuenta' => 1, 'Moneda' => 'QTZ', 'Monto' => 40, 'fecha_real' => '2024-09-28', 'created_at' => '2024-10-25', 'updated_at' => '2024-10-25'],
            ['id_transaccion' => 20, 'id_proyeccion' => 3, 'dia' => 1, 'motivo' => 'Menu 2', 'id_movimiento' => 1, 'id_cuenta' => 1, 'Moneda' => 'QTZ', 'Monto' => 40, 'fecha_real' => '2024-09-28', 'created_at' => '2024-10-25', 'updated_at' => '2024-10-25'],
            ['id_transaccion' => 21, 'id_proyeccion' => 3, 'dia' => 1, 'motivo' => 'Menu 2', 'id_movimiento' => 1, 'id_cuenta' => 1, 'Moneda' => 'QTZ', 'Monto' => 40, 'fecha_real' => '2024-09-28', 'created_at' => '2024-10-25', 'updated_at' => '2024-10-25'],
            ['id_transaccion' => 22, 'id_proyeccion' => 3, 'dia' => 1, 'motivo' => 'Menu 2', 'id_movimiento' => 1, 'id_cuenta' => 1, 'Moneda' => 'QTZ', 'Monto' => 40, 'fecha_real' => '2024-09-28', 'created_at' => '2024-10-25', 'updated_at' => '2024-10-25'],
            ['id_transaccion' => 23, 'id_proyeccion' => 3, 'dia' => 1, 'motivo' => 'Menu 2', 'id_movimiento' => 1, 'id_cuenta' => 1, 'Moneda' => 'QTZ', 'Monto' => 40, 'fecha_real' => '2024-09-28', 'created_at' => '2024-10-25', 'updated_at' => '2024-10-25'],
            ['id_transaccion' => 24, 'id_proyeccion' => 3, 'dia' => 1, 'motivo' => 'Menu 2', 'id_movimiento' => 1, 'id_cuenta' => 1, 'Moneda' => 'QTZ', 'Monto' => 40, 'fecha_real' => '2024-09-28', 'created_at' => '2024-10-25', 'updated_at' => '2024-10-25'],
            ['id_transaccion' => 25, 'id_proyeccion' => 3, 'dia' => 1, 'motivo' => 'Menu 2', 'id_movimiento' => 1, 'id_cuenta' => 1, 'Moneda' => 'QTZ', 'Monto' => 40, 'fecha_real' => '2024-09-28', 'created_at' => '2024-10-25', 'updated_at' => '2024-10-25'],
        ]);
        
    }
}

