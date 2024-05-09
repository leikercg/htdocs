<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void //Creación tabla pivot de grupos de trabajo y residentes
    {
        Schema::create('residentes_grupos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('residente_id');
            $table->unsignedBigInteger('grupo_id');
            $table->foreign('residente_id')->references('id')->on('residentes')->onDelete('cascade');
            $table->foreign('grupo_id')->references('id')->on('grupos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('residentes_grupos');
    }
};
