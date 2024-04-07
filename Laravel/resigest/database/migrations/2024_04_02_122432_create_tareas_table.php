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
        Schema::create('tareas', function (Blueprint $table) {
            $table->id();
            $table->date('Fecha')->nullable(false);
            $table->time('Hora')->nullable(false);
            $table->char('Id_auxiliar', 9)->nullable();
            $table->char('Id_empleado', 9);
            $table->string('Descripcion', 255)->nullable(false);
            $table->foreign('Id_auxiliar')->references('id')->on('empleados');
            $table->foreign('Id_empleado')->references('id')->on('empleados');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tareas');
    }
};
