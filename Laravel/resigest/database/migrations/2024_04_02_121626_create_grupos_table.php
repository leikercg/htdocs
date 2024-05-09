<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void //Creación tabla de grupos de terapia
    {
        Schema::create('grupos', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion', 255)->nullable(false);
            $table->date('fecha')->nullable(false);
            $table->time('hora', 0)->nullable(false);//Formato hh:mm
            $table->unsignedBigInteger('empleado_id');
            $table->foreign('empleado_id')->references('id')->on('empleados')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grupos');
    }
};
