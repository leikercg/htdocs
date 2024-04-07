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
        Schema::create('visitas', function (Blueprint $table) {
            $table->id();
            $table->char('Id_empleado', 9);
            $table->foreign('Id_empleado')->references('id')->on('empleados');
            $table->char('Id_residente', 9);
            $table->foreign('Id_residente')->references('Id_residente')->on('residentes');
            $table->date('Fecha')->nullable(false);
            $table->time('Hora')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitas');
    }
};
