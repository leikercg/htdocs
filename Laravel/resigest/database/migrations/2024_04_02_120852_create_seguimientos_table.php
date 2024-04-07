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
        Schema::create('seguimientos', function (Blueprint $table) {
            $table->id();
            $table->char('Id_residente', 9);
            $table->foreign('Id_residente')->references('Id_residente')->on('residentes');
            $table->unsignedBigInteger('Id_departamento');
            $table->foreign('Id_departamento')->references('id')->on('departamentos');
            $table->text('Seguimiento');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seguimientos');
    }
};
