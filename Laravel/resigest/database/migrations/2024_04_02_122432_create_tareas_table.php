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
            $table->date('fecha')->nullable(false);
            $table->time('hora')->nullable(false);
            $table->unsignedBigInteger('auxiliar_id');
            $table->unsignedBigInteger('empleado_id');
            $table->string('descripcion', 255)->nullable(false);
            $table->foreign('auxiliar_id')->references('id')->on('empleados')->onDelete('cascade');
            $table->foreign('empleado_id')->references('id')->on('empleados')->onDelete('cascade');

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
