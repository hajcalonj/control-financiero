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

                $faker = Faker::create();
        $startDate = Carbon::create(2023, 9, 1);
        $endDate = Carbon::create(2023, 10, 31);
        $date = $startDate;

        while ($date->lte($endDate)) {
            $id_proyeccion = $date->month == 9 
                ? ($date->day <= 15 ? 1 : 2) 
                : ($date->day <= 15 ? 3 : 4);

            // Simulate sales (multiple entries per day for meals)
            $sales = [
                ['motivo' => 'Desayuno', 'Monto' => 30],
                ['motivo' => 'Antojo 1', 'Monto' => 15],
                ['motivo' => 'Antojo 2', 'Monto' => 15],
                ['motivo' => 'Menu 1', 'Monto' => 30],
                ['motivo' => 'Menu 2', 'Monto' => 40],
                ['motivo' => 'Menu 3', 'Monto' => 45],
            ];

            foreach ($sales as $sale) {
                if (rand(0, 1)) {  // Randomize sales frequency
                    DB::table('transacciones')->insert([
                        'id_proyeccion' => $id_proyeccion,
                        'dia' => $date->day,
                        'motivo' => $sale['motivo'],
                        'id_movimiento' => 1,
                        'id_cuenta' => 1,
                        'Moneda' => 'QTZ',
                        'Monto' => $sale['Monto'],
                        'fecha_real' => $date->toDateString(),
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                }
            }

            // Simulate expenses
            $expenses = [
                ['motivo' => 'Pago Cocinero', 'Monto' => 75],
                ['motivo' => 'Pago Servicio', 'Monto' => 75],
                ['motivo' => 'Pago Ayudante', 'Monto' => 75],
                ['motivo' => 'Despensa', 'Monto' => rand(80, 120)],
            ];

            if ($date->day <= 5) {
                $expenses[] = ['motivo' => 'Renta', 'Monto' => 3000];
                $expenses[] = ['motivo' => 'Agua', 'Monto' => 300];
            }
            if ($date->day == 10 || $date->day == 25) {
                $expenses[] = ['motivo' => 'Gas', 'Monto' => 300];
            }
            if ($date->day % 7 == 0) {
                $expenses[] = ['motivo' => 'Mercado', 'Monto' => rand(700, 900)];
            }
            if (rand(0, 1)) {
                $expenses[] = ['motivo' => 'Mantenimiento', 'Monto' => rand(100, 300)];
            }

            foreach ($expenses as $expense) {
                DB::table('transacciones')->insert([
                    'id_proyeccion' => $id_proyeccion,
                    'dia' => $date->day,
                    'motivo' => $expense['motivo'],
                    'id_movimiento' => 2,
                    'id_cuenta' => 1,
                    'Moneda' => 'QTZ',
                    'Monto' => $expense['Monto'],
                    'fecha_real' => $date->toDateString(),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }

            // Move to the next day
            $date->addDay();
        }
    }
}
