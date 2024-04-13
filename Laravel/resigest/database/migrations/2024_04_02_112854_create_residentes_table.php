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
            $table->id();
            $table->char('dni', 9);
            $table->string('nombre', 255)->nullable(false);
            $table->string('apellidos', 255)->nullable(false);
            $table->integer('habitacion')->nullable(false);
            $table->string('estado')->nullable(false);
            $table->date('fecha_nac')->nullable(false);
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
