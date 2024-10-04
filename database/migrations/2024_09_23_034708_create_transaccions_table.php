<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transacciones', function (Blueprint $table) {
            $table->id('id_transaccion');
            $table->unsignedBigInteger('id_proyeccion');
            $table->integer('dia');
            $table->string('motivo');
            $table->unsignedBigInteger('id_movimiento');
            $table->unsignedBigInteger('id_cuenta');
            $table->string('Moneda');
            $table->float('Monto', 8, 2);
            $table->date('fecha_real');
            $table->timestamps();

            $table->foreign('id_proyeccion')->references('id')->on('proyeccion')->onDelete('cascade');
            $table->foreign('id_movimiento')->references('id')->on('tipo_movimiento');
            $table->foreign('id_cuenta')->references('id')->on('tipo_cuenta');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transacciones');
    }
};
