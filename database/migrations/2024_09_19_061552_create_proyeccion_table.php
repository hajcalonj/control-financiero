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
        Schema::create('proyeccion', function (Blueprint $table) {
            $table->id();
            $table->integer('mes');
            $table->unsignedBigInteger('id_usuario');
            $table->string('comentario', 255);
            $table->float('CambioUSD', 8, 3);
            $table->float('CambioOtro', 8, 3);
            $table->float('Total', 8, 2);
            $table->float('Entrada', 8, 2);
            $table->float('Salida', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyeccion');
    }
};
