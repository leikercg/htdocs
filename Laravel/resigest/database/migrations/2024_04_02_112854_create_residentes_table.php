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
        Schema::create('residentes', function (Blueprint $table) {
            $table->char('Id_residente', 9)->primary();
            $table->string('Nombre', 255)->nullable(false);
            $table->string('Apellidos', 255)->nullable(false);
            $table->integer('Habitacion')->nullable(false);
            $table->date('Fecha_Nac')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('residentes');
    }
};
