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
        Schema::create('curas', function (Blueprint $table) {
            $table->id();
            $table->char('Id_residente', 9);
            $table->char('Id_empleado', 9);
            $table->date('Fecha')->nullable(false);
            $table->time('Hora')->nullable(false);
            $table->string('Zona', 255)->nullable(false);
            $table->string('Estado', 50)->nullable(false);
            $table->foreign('Id_residente')->references('Id_residente')->on('residentes');
            $table->foreign('Id_empleado')->references('id')->on('empleados');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('curas');
    }
};
